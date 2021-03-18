<?php

namespace App\Http\Controllers;

use App\Article;
use App\Typearticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typearticles = Typearticle::get();
        if(request()->ajax())
        {
            $users = DB::table('articles')->join('typearticles', 'articles.ref_typeArticle', '=', 'typearticles.id')->select('articles.*', 'typearticles.nom')->get();

            return datatables()->of($users)
                    ->addColumn('action', function($data){
                        $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button>';
                        $button .= '&nbsp;&nbsp;';
                        $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.articles.index')->with('typearticles', $typearticles);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'titre'    =>  'required',
            'description'     =>  'required',
            'ref_typearticle' => 'required',
            'image'         =>  'required|image|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('images'), $new_name);

        $form_data = array(
            'titre'           =>  $request->titre,
            'ref_typearticle' => $request->ref_typearticle,
            'description'     =>  $request->description,
            'image'           =>  $new_name
        );

        Article::create($form_data);

        return response()->json(['success' => 'Données ajoutées avec succès.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Article::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $rules = array(
                'titre'    =>  'required',
                'description'     =>  'required',
                'ref_typearticle' => 'required',
                'image'         =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            );
            $error = Validator::make($request->all(), $rules);
            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $rules = array(
                'titre'    =>  'required',
                'description'     =>  'required',
                'ref_typearticle' => 'required',
            );

            $error = Validator::make($request->all(), $rules);

            if($error->fails())
            {
                return response()->json(['errors' => $error->errors()->all()]);
            }
        }

        $form_data = array(
            'titre'           => $request->titre,
            'description'     => $request->description,
            'ref_typearticle' => $request->ref_typearticle,
            'image'           => $image_name
        );

        Article::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Les données sont mises à jour avec succès']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Article::findOrFail($id);
        $data->delete();
    }
}
