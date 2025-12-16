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
                            <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="company_name">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number" name="phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
    </section>
</x-app-layout>
