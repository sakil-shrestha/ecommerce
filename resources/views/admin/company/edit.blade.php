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
                            <form action="{{ route('company.update', $company->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control" name="company_name"
                                        value="{{ $company->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ $company->address }}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email"
                                        value="{{ $company->email }}">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control phone-number" name="phone"
                                            value="{{ $company->phone }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control" name="logo" value="{{ $company->logo }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>




                        </div>


                    </div>

                </div>
            </div>
    </section>
</x-app-layout>
