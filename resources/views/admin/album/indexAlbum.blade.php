@extends('admin.main')

@section('content')

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div>
                        Album
                        <div class="page-title-subheading">
                            View, create, update, delete and manage.
                        </div>
                    </div>
                </div>

                <div class="page-title-actions">
                    <a href="{{route('album.create')}}"
                       class="btn-shadow btn-hover-shine mr-3 btn btn-primary">
                                    <span class="btn-icon-wrapper pr-2 opacity-7">
                                        <i class="fa fa-plus fa-w-20"></i>
                                    </span>
                        Create
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <x-alert/>
                    <div class="card-header">
                    </div>

                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover text-center">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($albums as $album)
                                <tr>
                                    <td class="text-center text-muted">{{$loop->index}}</td>
                                    <td class="text-center text-muted"><img width="70"
                                                                            src="{{ $album->image != null ? asset('uploads/'. $album->image)  : asset('template/admin/assets/images/default-album.png')}}"
                                                                            alt=""></td>
                                    <td class="text-center text-muted">{{$album->name}}</td>
                                    <td class="text-center text-muted" width="700">{{$album->description}}</td>

                                    <td class="text-center">
                                        <a href="{{route('album.edit', $album->id)}}"
                                           data-toggle="tooltip" title="" data-placement="bottom"
                                           class="btn btn-outline-warning border-0 btn-sm"
                                           data-original-title="Edit">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-edit fa-w-20"></i>
                                                            </span>
                                        </a>
                                        <form action="{{route('album.destroy', $album->id)}}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                         <button class="btn btn-hover-shine btn-outline-danger border-0 btn-sm"
                                               href=""
                                               type="submit" data-toggle="tooltip" title=""
                                               data-placement="bottom"
                                               onclick="return confirm('Do you really want to delete this item?')"
                                               data-original-title="Delete">
                                                            <span class="btn-icon-wrapper opacity-8">
                                                                <i class="fa fa-trash fa-w-20"></i>
                                                            </span>
                                         </button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <img src="{{asset('template/admin/assets/images/empty.jpg')}}" width="500" height="440" alt="">
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-block card-footer">
                        <nav role="navigation" aria-label="Pagination Navigation"
                             class="flex items-center justify-between">
                            {{$albums->withQueryString()->links()}}
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
