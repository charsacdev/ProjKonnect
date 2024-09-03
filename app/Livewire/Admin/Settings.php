<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AdminRevenueSettings;
use App\Models\UserwebPlans;


class Settings extends Component
{
    #Revenue Sharing 
    public $siteowner,$proguide;

    #Dollar Poins
    public $points,$dollar;

    #Plan settings
    public $premium,$premiumplus;

    public function mount(){
        $settingDetails=AdminRevenueSettings::where('id',1)->first();

        
        if($settingDetails){
            #proguide default value
            $this->proguide=$settingDetails->revenue_sharing['proguide_percent'];
            $this->siteowner=$settingDetails->revenue_sharing['siteowner_percent'];

            #point value
            $this->points=$settingDetails->point_setting['points'];
            $this->dollar=$settingDetails->point_setting['dollar_value'];

            $this->premium=$settingDetails->plans_pricing['premium'];
            $this->premiumplus=$settingDetails->plans_pricing['premiumplus'];
        }
        
    }

    public function RevenueSharing(){
        
       try{
          $revenueCheck=AdminRevenueSettings::where('id',1)->first();
          if($revenueCheck==TRUE){
              
                #update code
                $revenueData=[
                    'siteowner_percent'=>$this->siteowner,
                    'proguide_percent'=>$this->proguide
                ];

                $revenue=AdminRevenueSettings::where('id',1)->update([
                    'revenue_sharing'=>$revenueData
                ]);

                if($revenue){
                    session()->flash('success','Revenue Settings Updated Successfully');
                    return redirect('admin-projkonnect/settings');
                }
          }
          else{
             
              #insert code
              $revenueData=[
                'siteowner_percent'=>$this->siteowner,
                'proguide_percent'=>$this->proguide
              ];
              $data=[
                'points'=>'0',
                'dollar_value'=>'0'
              ];
              $data2=[
                'premium'=>'0',
                'premiumplus'=>'0'
              ];
              

              $revenue=AdminRevenueSettings::create([
                'revenue_sharing'=>$revenueData,
                'point_setting'=>$data,
                'plans_pricing'=>$data2
              ]);
              if($revenue){
                session()->flash('success','Revenue Settings Updated Successfully');
                return redirect('admin-projkonnect/settings');
              }
          }
       }
       catch(\Throwable $g){
            #dd($g->getMessage());
            session()->flash('success','A network error occured');
            return redirect('admin-projkonnect/settings');
       }
    }


    #Points Settings
    public function PointSettings(){
        try{
           $PointsCheck=AdminRevenueSettings::where('id',1)->first();
           if($PointsCheck==TRUE){

                #update code
                $pointsData=[
                    'points'=>$this->points,
                    'dollar_value'=>$this->dollar
                ];
              
                 #update code
                 $points=AdminRevenueSettings::where('id',1)->update([
                    'point_setting'=>$pointsData,
                 ]);
                 if($points){
                    session()->flash('success','Points Settings Updated Successfully');
                    return redirect('admin-projkonnect/settings');
                 }
           }
           else{
                #insert code
                $pointsData=[
                    'points'=>$this->points,
                    'dollar_value'=>$this->dollar
                ];
                $data=[
                    'siteowner_percent'=>'0',
                    'proguide_percent'=>'0'
                ];

                $data2=[
                    'premium'=>'0',
                    'premiumplus'=>'0'
                  ];

                $points=AdminRevenueSettings::create([
                    'revenue_sharing'=>$data,
                    'point_setting'=>$pointsData,
                    'plans_pricing'=>$data2
                ]);
                if($points){
                    session()->flash('success','Points Settings Updated Successfully');
                    return redirect('admin-projkonnect/settings');
                }
           }
        }
        catch(\Throwable $g){
             #dd($g->getMessage());
             session()->flash('success','A network error occured');
             return redirect('admin-projkonnect/settings');
        }
     }




    #Plans Settings
    public function PlanSettings(){
        try{
           $planCheck=AdminRevenueSettings::where('id',1)->first();
           if($planCheck==TRUE){

                #update code
                $plansData=[
                    'premium'=>$this->premium,
                    'premiumplus'=>$this->premiumplus
                ];

                 #update code
                 $plans=AdminRevenueSettings::where('id',1)->update([
                    'plans_pricing'=>$plansData,
                 ]);
                 if($plans){
                    session()->flash('success','Plans Settings Updated Successfully');
                    return redirect('admin-projkonnect/settings');
                 }
           }
           else{
                #insert code
                $plansData=[
                    'premium'=>$this->premium,
                    'premiumplus'=>$this->premiumplus
                ];

                $data=[
                    'siteowner_percent'=>'0',
                    'proguide_percent'=>'0'
                  ];
                $data2=[
                    'points'=>'0',
                    'dollar_value'=>'0'
                  ];

                $plans=AdminRevenueSettings::create([
                    'revenue_sharing'=>$data,
                    'point_setting'=>$data2,
                    'plans_pricing'=>$plansData
                ]);
                if($plans){
                    session()->flash('success','Plans Settings Updated Successfully');
                    return redirect('admin-projkonnect/settings');
                }
           }
        }
        catch(\Throwable $g){
             #dd($g->getMessage());
             session()->flash('success','A network error occured');
             return redirect('admin-projkonnect/settings');
        }
     }
 


    public function render()
    {
        return view('livewire.admin.settings');
    }
}
