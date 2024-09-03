<div>
    <div class="main-content">
        
        <div class="row">
           <form action="" wire:submit.prevent="AddAuthor">
               <div class="row">
                   <div class="col-sm-6 mb-4">
                       <div class="form-group">
                           <input type="text" wire:model="fname" class="form-control custom " placeholder="First name" required>
                       </div>
                   </div>
                   <div class="col-sm-6 mb-4">
                    <div class="form-group">
                        <input type="text" wire:model="lname" class="form-control custom " placeholder="Last name" required>
                    </div>
                </div>
                   <div class="col-sm-12 mb-4">
                       <div class="form-group">
                           <input type="text" wire:model="email" class="form-control custom " placeholder="Email address" required>
                       </div>
                   </div>

                   <div class="col-sm-6 mb-4">
                    <select wire:model="gender" id="gener" class="form-control" required>
                        <option value="">Select gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                     </select>
                </div>

                <div class="col-sm-6 mb-4">
                    <select wire:model="role" id="gener" class="form-control" required>
                        <option value="">Select Role</option>
                        <option value="author">Author</option>
                        <option value="finance">Accounting</option>
                        <option value="manager">Administrative</option>
                     </select>
                </div>
               </div>
               <button type="submit" wire:target="AddAuthor" class="text-center new-discussion-btn w-100" style="border-radius: 0;">
                  <span wire:loading.remove>Add Author</span>
                  <span wire:loading wire:target="AddAuthor" style="cursor: not-allowed">
                     <i class="fa fa-spin fa-spinner"></i>&nbsp;Processing...
                  </span>
                </button>
           </form>
          </div>
        </div>
</div>
