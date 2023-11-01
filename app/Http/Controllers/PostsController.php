<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PostsController\Publish;


class PostsController extends Controller
{
    public function index()
    {
        $posts = Posts::where('status', 'publish')->get();
        $post = Posts::all();
        return view('posts.index', [
            'posts' => $post,
            'title' => 'News Uploads',
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengunggah gambar jika ada
        $gambarName = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('storage/uploads'), $gambarName);
        }

        // Membuat postingan baru
        Posts::create([
            'judul' => $request->input('judul'),
            'tanggal' => $request->input('tanggal'),
            'isi' => $request->input('isi'),
            'gambar' => $gambarName,
            'status' => 'Post'
        ]);

        return redirect()->route('posts')->with('sukses', 'Postingan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function view($id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return redirect()->route('posts')->with('error', 'Postingan tidak ditemukan.');
        }

        return view('posts.view', [
            'post' => $post,
            'title' => 'View'
        ]);
    }
    
    public function ambilTeksPenuh($id)
    {
        $post = Posts::find($id);
    
        return $post->isi;
    }

    public function edit($id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return redirect()->route('posts')->with('error', 'Postingan tidak ditemukan.');
        }

        return view('posts.edit', [
            "title" => "Edit",
            "post" => $post,
        ]);
    }



    public function destroy(Posts $post)
    {
        $gambarName = $post->gambar;
        $post->delete();
        if (!empty($gambarName)) {
            if (Storage::exists('storage/uploads' . $gambarName)) {
                Storage::delete('storage/uploads' . $gambarName);
            }
        }
        return redirect()->route('posts')->with('sukses', 'Postingan berhasil dihapus.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'isi' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Mengunggah gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('storage/uploads'), $gambarName);
            $post->gambar = $gambarName;
        }

        // Mengupdate postingan
        $post->judul = $request->input('judul');
        $post->tanggal = $request->input('tanggal');
        $post->isi = $request->input('isi');
        $post->status = 'Post';
        $post->save();

        return redirect()->route('posts')->with('sukses', 'Postingan berhasil diperbarui.');
    }

    public function publish($id)
    {
        $post = Posts::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Postingan tidak ditemukan.');
        }

        // Ubah status postingan menjadi "publish"
        $post->status = 'Publish';
        $post->published_at = now(); // Jika Anda ingin menyimpan tanggal publikasi.
        $post->save();

        return redirect()->back()->with('sukses', 'Postingan berhasil dipublikasikan.');
    }
}
