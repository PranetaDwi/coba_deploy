<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Http;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

/**
* @OA\Info(
* description="Ini punya Neta",
* version="0.0.1",
* title="Contoh API documentation (pertemuan 12)",
* termsOfService="http://swagger.io/terms/",
* @OA\Contact(
* email="pranetaw23@gmail.com"
* ),
* @OA\License(
* name="Apache 2.0",
* url="http://www.apache.org/licenses/LICENSE-2.0.html"
* )
* )
*/

class GalleryAPIController extends Controller
{
        /**
    * @OA\Get(
        * path="/api/getgallery",
        * tags={"Get Data Gallery"},
        * summary="Dapetin Data Gallery",
        * description="Apakah API-nya berjalan? (duar-duar)",
        * operationId="GetGallery",
    * @OA\Response(
            * response="default",
            * description="successful operation"
        * )
    * )
    */
    public function getGallery()
    {
        $post = Post::all();
        return response()->json(["data"=>$post]);
    }

    public function index(){

        $response = Http::get('http://172.203.228.106/api/getgallery');
        $datas = $response->object()->data;
        return view('galleryAPI.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('galleryAPI.create');
    }

    /**
     * Store a newly created resource in storage.
     */

/**
 * @OA\Post(
 *     path="/api/postGallery",
 *     tags={"Upload Gambar"},
 *     summary="Mengunggah Gambar",
 *     description="Endpoint untuk mengunggah gambar.",
 *     operationId="postGallery",
 *     @OA\RequestBody(
 *         required=true,
 *         description="Data untuk mengunggah gambar",
 *         @OA\MediaType(
 *             mediaType="multipart/form-data",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="title",
 *                     description="Judul Upload",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="description",
 *                     description="Deskripsi Gambar",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="picture",
 *                     description="File Gambar",
 *                     type="string",
 *                     format="binary"
 *                 ),
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response="default",
 *         description="Successful operation"
 *     )
 * )
 */
    public function postGallery(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required',
            'picture' => 'image|nullable|max:1999'
            ]);
            if ($request->hasFile('picture')) {
            $filenameWithExt = $request->file('picture')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $basename = uniqid() . time();
            $smallFilename = "small_{$basename}.{$extension}";
            $mediumFilename = "medium_{$basename}.{$extension}";
            $largeFilename = "large_{$basename}.{$extension}";
            $filenameSimpan = "{$basename}.{$extension}";
            $path = $request->file('picture')->storeAs('posts_image', $filenameSimpan);

            $request->file('picture')->storeAs("posts_image", $smallFilename);
            $request->file('picture')->storeAs("posts_image", $mediumFilename);
            $request->file('picture')->storeAs("posts_image", $largeFilename);

            $this->createThumbnail(public_path() . "/storage/posts_image/" . $smallFilename, 150,93);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $mediumFilename, 300,185);
            $this->createThumbnail(public_path() . "/storage/posts_image/" . $largeFilename, 150,93);

            } else {
            $filenameSimpan = 'noimage.png';
            }

            $post = new Post;
            $post->picture = $filenameSimpan;
            $post->title = $request->input('title');
            $post->description = $request->input('description');
            $post->save();
            
            return redirect()->route('apiListgallery')->with('success', 'Berhasil menambahkan data baru');
           
    }

    public function createThumbnail($path, $width, $height)
    {
    $img = Image::make($path)->resize($width, $height, function ($constraint) {
        $constraint->aspectRatio();
    });
    $img->save($path);
    }

// /**
//  * @OA\Post(
//  *     path="/api/deleteGallery/{id}",
//  *     tags={"Hapus Upload"},
//  *     summary="Hapus Upload",
//  *     description="Hapus Uploadddd",
//  *     operationId="hapusUpload",
//  *     @OA\Parameter(
//  *         name="id",
//  *         description="id upload",
//  *         required=true,
//  *         in="path",
//  *         @OA\Schema(
//  *             type="string"
//  *         )
//  *     ),
//  *     @OA\Response(
//  *         response="default",
//  *         description="successful operation"
//  *     )
//  * )
//  */

    // public function deleteGallery(Request $request, string $id)
    // {
    //     $id = $request->only([
    //         'id',
    //         ]);
    //     $post = Post::findOrFail($id);

    //     //delete image
    //     File::delete(public_path() ."/storage/posts_image/".$post->picture);

    //     //delete post
    //     $post->delete();

    //     //redirect to index
    //     return redirect()->route('apiGetgallery')->with(['success' => 'Data Berhasil Dihapus!']);
    // }

}
