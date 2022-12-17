<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>signin</title>
</head>

<body>


    <section class="vh-100">

        <div class="d-flex justify-content-center align-items-center">
            @include('sidebar')

            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0 d-flex justify-content-center">
                                <div class="col-md-6 col-lg-7 d-flex align-items-center ">
                                    <div class="card-body p-4 p-lg-5 text-black ">

                                        <form
                                            action="{{ isset($group) ? route('group.update', $group[0]['id']) : route('group.store') }}"
                                            method="POST">
                                            @csrf
                                            @isset($group)
                                                @method('PATCH')
                                            @endisset
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                                <span class="h1 fw-bold mb-0">Add group</span>
                                            </div>


                                            <div class="d-flex">
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="name">Person Name</label>
                                                    <input type="text" name="name" id="name"
                                                        value="{{ isset($group) ? $group[0]['name'] : '' }}"
                                                        class="form-control form-control-lg" />
                                                    @error('name')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-outline mb-4">
                                                    <label class="form-label" for="place">Place Name</label>
                                                    <input type="text" name="place" id="place" value="{{ isset($group) ? $group[0]['place'] : '' }}"
                                                        class="form-control form-control-lg" />
                                                    @error('place')
                                                        <h6 class="text-danger">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="personimage">Person Image</label>
                                                <input type="text" name="personimage" id="personimage" value="{{ isset($group) ? $group[0]['personimage'] : '' }}"
                                                    class="form-control form-control-lg" />
                                                @error('personimage')
                                                    <h6 class="text-danger">{{ $message }}</h6>
                                                @enderror
                                            </div>

                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="city">City Name</label>
                                                <input type="text" name="city" id="city" value="{{ isset($group) ? $group[0]['city'] : '' }}"
                                                    class="form-control form-control-lg" />
                                                @error('city')
                                                    <h6 class="text-danger">{{ $message }}</h6>
                                                @enderror
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="placeimage">place Image</label>
                                                <input type="text" name="placeimage" id="placeimage" value="{{ isset($group) ? $group[0]['placeimage'] : '' }}"
                                                    class="form-control form-control-lg" />
                                                @error('placeimage')
                                                    <h6 class="text-danger">{{ $message }}</h6>
                                                @enderror
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="date">Start Date</label>
                                                <input type="date" name="date" id="date" value="{{ isset($group) ? $group[0]['date'] : '' }}"
                                                    class="form-control form-control-lg" />
                                                @error('date')
                                                    <h6 class="text-danger">{{ $message }}</h6>
                                                @enderror
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="time">Start time</label>
                                                <input type="time" name="time" id="time" value="{{ isset($group) ? $group[0]['time'] : '' }}"
                                                    class="form-control form-control-lg" />
                                                @error('time')
                                                    <h6 class="text-danger">{{ $message }}</h6>
                                                @enderror
                                            </div>


                                            <div class="pt-1 mb-4">
                                                <button class="btn btn-warning btn-lg fw-bold btn-block" type="submit"
                                                    style="width: 100%;">{{ isset($group) ? 'Update' : 'Add' }}</button>
                                            </div>


                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
