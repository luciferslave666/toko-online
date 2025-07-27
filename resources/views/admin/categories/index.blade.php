{{-- resources/views/admin/categories/index.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Manajemen Kategori</h1>
        <a href="{{ route('admin.categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700">
            + Tambah Kategori Baru
        </a>
    </div>
    {{-- (Tambahkan notifikasi sukses di sini jika perlu) --}}
    <div class="bg-white shadow-md rounded-lg">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 ...">Nama Kategori</th>
                    <th class="px-5 py-3 border-b-2 ...">Slug</th>
                    <th class="px-5 py-3 border-b-2 ..."></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <td class="px-5 py-5 ...">{{ $category->name }}</td>
                    <td class="px-5 py-5 ...">{{ $category->slug }}</td>
                    <td class="px-5 py-5 ... text-right">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-900 ml-4">Hapus</a>
                    </td>
                </tr>
                @empty
                <tr><td colspan="3" class="text-center py-10">Tidak ada kategori.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection