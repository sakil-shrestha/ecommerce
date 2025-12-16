<x-app-layout>

    <section class="section">
        <div class="section-body">
            <div class="row">


            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Advanced Table</h4>
                            <div class="card-header-form d-flex">
                                <form class="mr-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <div>
                                    <a href="{{route('category.create')}}" class="btn btn-primary">Add New</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th class="text-center">
                                            <div class="custom-checkbox custom-checkbox-table custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    data-checkbox-role="dad" class="custom-control-input"
                                                    id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>Category Title</th>
                                        <th>Action</th>

                                    </tr>

                                    @foreach($categories as $category)
                                    <tr>
                                        <td class="p-0 text-center">
                                            <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup"
                                                    class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>{{ $category->name }}</td>

                                        <td>
                                            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</x-app-layout>
