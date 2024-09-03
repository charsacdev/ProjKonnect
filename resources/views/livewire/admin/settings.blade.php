<div>
    <div class="main-content">
      <!--error message-->
      @if(session('error'))
      <p class="text-danger text-center fw-bold" style="font-size:18px">{{session('error')}}</p>
          @elseif(session('success'))
          <p class="text-success text-center fw-bold" style="font-size:18px">{{session('success')}}</p>
      @endif

        <div class="row">
             <div class="col-lg-6 mb-5">
                  <div class="card">
                       <div class="card-body">
                            <div class="row">
                                 <div class="col-lg-12 mb-4">
                                 <form action="" wire:submit.prevent="RevenueSharing">
                                      <div class="row">
                                           <h4 class="mb-5">Revenue Sharing</h4>
                                           <div class="col-lg-6 col-sm-6 mb-4">
                                           <div class="form-group">
                                                <h5>Site Owner (%)</h5>
                                                <input type="number" name="" max="100" id="" wire:model="siteowner" required class="form-control custom">
                                           </div>
                                           </div>
                                           <div class="col-lg-6 col-sm-6 mb-4">
                                           <div class="form-group">
                                                <h5>Proguide (%)</h5>
                                                <input type="number" max="100" id="" wire:model="proguide" required  class="form-control custom">
                                           </div>
                                           </div>
                                      </div>
                                      <div class="d-flex align-items-center justify-content-end mt-4">
                                           <button type="submit" class="text-center new-discussion-btn px-sm-5" >
                                             <span wire:loading.remove>Save Changes</span>
                                             <span wire:loading wire:target="RevenueSharing" style="cursor: not-allowed">
                                                 <i class="fa fa-spin fa-spinner"></i>&nbsp;Updating...
                                             </span>
                                           </button>
                                      </div>
                                 </form>
                                 </div>
                            
                            </div>
                       </div>
                  </div>
             </div>
             <div class="col-lg-6 mb-5">
                  <div class="card">
                       <div class="card-body">
                            <div class="row">
                                 <div class="col-lg-12 mb-4">
                                 <form action="" wire:submit.prevent="PointSettings">
                                      <div class="row">
                                           <h4 class="mb-5">Points to dollar equivalence</h4>
                                           <div class="col-lg-6 col-sm-6 mb-4">
                                           <div class="form-group">
                                                <h5>Points</h5>
                                                <input type="number" name="" id=""  wire:model="points" required class="form-control custom">
                                           </div>
                                           </div>
                                           <div class="col-lg-6 col-sm-6 mb-4">
                                           <div class="form-group">
                                                <h5>Dollar</h5>
                                                <input type="text" id="" wire:model="dollar" required class="form-control custom">
                                           </div>
                                           </div>
                                      </div>
                                      <div class="d-flex align-items-center justify-content-end mt-4">
                                           <button type="submit" class="text-center new-discussion-btn px-sm-5" >
                                             <span wire:loading.remove>Save Changes</span>
                                             <span wire:loading wire:target="PointSettings" style="cursor: not-allowed">
                                                 <i class="fa fa-spin fa-spinner"></i>&nbsp;Updating...
                                             </span>
                                        </button>
                                      </div>
                                 </form>
                                 </div>
                            </div>
                            
                       </div>
                  
                  </div>
             </div>

             <div class="col-lg-12 mb-5">
               <div class="card">
                    <div class="card-body">
                         <div class="row">
                              <div class="col-lg-12 mb-4">
                              <form action="" wire:submit.prevent="PlanSettings">
                                   <div class="row">
                                        <h4 class="mb-5">Plans Pricing</h4>
                                        <div class="col-lg-6 col-sm-6 mb-4">
                                        <div class="form-group">
                                             <h5>Premium($)</h5>
                                             <input type="number" name="" id="" wire:model="premium" required class="form-control custom">
                                        </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 mb-4">
                                        <div class="form-group">
                                             <h5>Premium Plus($)</h5>
                                             <input type="number" id="" wire:model="premiumplus" required class="form-control custom">
                                        </div>
                                        </div>
                                   </div>
                                   <div class="d-flex align-items-center justify-content-end mt-4">
                                        <button type="submit" class="text-center new-discussion-btn px-sm-5" >
                                             <span wire:loading.remove>Save Changes</span>
                                             <span wire:loading wire:target="PlanSettings" style="cursor: not-allowed">
                                                 <i class="fa fa-spin fa-spinner"></i>&nbsp;Updating...
                                             </span>
                                        </button>
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
