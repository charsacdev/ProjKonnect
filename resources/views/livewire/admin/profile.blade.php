<div>
    <div class="main-content">
        <div class="row">
             <div class="col-lg-11 col-12">
                 <div class="row align-items-start">
                     <div class="col-md-5 mt-5">
                         <div class="profile-ctn">
                             <div class="img" id="imagePreview">
                                @if($photo)
                                <img src="{{$photo->temporaryUrl()}}" alt="">
                                @else
                                 <img src="{{asset('proguide-asset/asset/img/user-picture.png')}}" alt="">
                                @endif
                                
                             </div>
                             <div>
                                 <input type="file" class="d-none" wire:model="photo" id="profile_picture">
                                 <label class="file-label" for="profile_picture">Change Picture</label>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-7 mt-5">
                        <div class="profile-details">
                            <h3>Profile Details</h3>

                            <!--message-->
                            @if(session('error'))
                                   <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
                               @elseif(session('success'))
                               <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
                           @endif
                            <form action="" wire:submit.prevent="UpdateProfile">
                                <div class="row">
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" id="first_name" wire:model="first_name" class="form-control" @error('first_name') style="border:1px solid red !important" @enderror>
                                            @error('first_name')
                                            <div class="text-danger">{{ $message }}</div>
                                           @enderror
                                       </div>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" id="last_name" wire:model="last_name" class="form-control" @error('last_name') style="border:1px solid red !important" @enderror>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" id="email" wire:model="email"  class="form-control" @error('email') style="border:1px solid red !important" @enderror>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" id="phone_number" wire:model="phone_number" class="form-control" @error('phone_number') style="border:1px solid red !important" @enderror>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="gender">Gender</label>
                                            <select wire:model="gender" id="gener" class="form-control" @error('gender') style="border:1px solid red !important" @enderror>
                                               <option value="">Select</option>
                                               <option value="m">Male</option>
                                               <option value="f">Female</option>
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select wire:model="country" id="country" class="form-control" @error('country') style="border:1px solid red !important" @enderror>
                                               <option value="">Select Country</option>
                                               @foreach ($countries as $item)
                                                 <option value="{{$item->id}}">{{$item->name}}</option>
                                               @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="qualification">Qualification</label>
                                            <select wire:model="qualification" id="qualification" class="form-control" @error('qualification') style="border:1px solid red !important" @enderror>
                                               <option value="">Select</option>
                                               @foreach ($qualification_all as $item)
                                                   <option value="{{$item->id}}">{{$item->qualification}}</option>
                                               @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="university">University</label>
                                           <input type="text" wire:model="university" id="university" class="form-control" @error('university') style="border:1px solid red !important" @enderror>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row" style="border-bottom: 2px dashed rgba(0,0,0,0.1);">
                                    <!--message-->
                                     @if(session('password-error'))
                                        <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('password-error')}}</p>
                                    @endif
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <div class="input-group i-group-div" @error('password') style="border:1px solid red !important" @enderror>
                                                <input type="password" wire:model="password" class="form-control shadow-none psw_input">
                                                <div class="input-group-text rlf-hd">
                                                  <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                                                  <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        @error('password')
                                        <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <div class="col-sm-6 mb-4">
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <div class="input-group i-group-div" @error('password') style="border:1px solid red !important" @enderror>
                                                <input type="password" wire:model="password_confirmation" class="form-control shadow-none psw_input">
                                                <div class="input-group-text rlf-hd">
                                                  <span class="d-none rlf-hd-show"><i class="fa fa-eye"></i></span>
                                                  <span class="rlf-hd-hide"><i class="fa fa-eye-slash"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-end mt-3">
                                    <button type="submit" wire:target="UpdateProfile" wire:loading.attr="disabled" class="submit-btn">
                                        <span wire:loading.remove> Update Profile</span>
                                             <span wire:loading style="cursor: not-allowed">
                                                 <i class="fa fa-spin fa-spinner"></i>&nbsp;Please wait...
                                             </span>
                                    </button>
                                    <style>
                                       .submit-btn:disabled{
                                           opacity:0.5;
                                       }
                                   </style>
                               </div>
                            </form>
                        </div>
                    </div>
                 </div>
             </div>
             <div class="col-lg-1"></div>
         </div>

    </div>
</div>
