<x-app-layout>

    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Company Information</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" class="form-control" name="category_name">
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
    </section>
</x-app-layout>
