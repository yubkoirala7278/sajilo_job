@extends('admin.layout.master')
@section('content')
    <main id="main" class="main">
        <section class="section profile">
            <div class="row">
                <div class="col-12 card p-3">
                    <form action="{{ route('admin.employer.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{-- company name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Company Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Enter company name" value="{{old('name',$user->name)}}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        {{-- company email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Company Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Enter company email" value="{{old('name',$user->email)}}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        {{-- company contact_number --}}
                        <div class="mb-3">
                            <label for="contact_number" class="form-label">Company Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number"
                                placeholder="Enter company contact number" value="{{old('contact_number',$user->employer->contact_number)}}">
                            @if ($errors->has('contact_number'))
                                <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                            @endif
                        </div>
                        {{-- company website --}}
                        <div class="mb-3">
                            <label for="company_website" class="form-label">Company Website Link</label>
                            <input type="text" class="form-control" id="company_website" name="company_website"
                                placeholder="Enter company website link"  value="{{old('company_website',$user->employer->company_website)}}">
                            @if ($errors->has('company_website'))
                                <span class="text-danger">{{ $errors->first('company_website') }}</span>
                            @endif
                        </div>
                        {{-- company address --}}
                        <div class="mb-3">
                            <label for="company_address" class="form-label">Company Address</label>
                            <input type="text" class="form-control" id="company_address" name="company_address"
                                placeholder="Enter company address" value="{{old('company_address',$user->employer->company_address)}}">
                            @if ($errors->has('company_address'))
                                <span class="text-danger">{{ $errors->first('company_address') }}</span>
                            @endif
                        </div>
                        {{-- company company_logo --}}
                        <div class="mb-3">
                            <label for="company_logo" class="form-label">Company Logo</label>
                            <input class="form-control" type="file" id="company_logo" name="company_logo">
                            @if ($errors->has('company_logo'))
                                <span class="text-danger">{{ $errors->first('company_logo') }}</span>
                            @endif
                        </div>
                        {{-- company description --}}
                        <div class="mb-3">
                            <label for="company_description" class="form-label">Company Description</label>
                            <textarea class="form-control" placeholder="Company Description" id="company_description" name="company_description"
                                placeholder="Enter company description">{{old('company_description',$user->employer->company_description)}}</textarea>
                            @if ($errors->has('company_description'))
                                <span class="text-danger">{{ $errors->first('company_description') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
