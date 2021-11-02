<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\City;
use App\Ship;
use App\District;
use App\Village;
use DB;
use Illuminate\Support\Facades\Redirect;


class ShipController extends Controller
{
    public function update_ship(Request $request){
        $data = $request->all();
        $fee_ship = Ship::find($data['feeship_id']);
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->ship_feeship = $fee_value;
        $fee_ship->save();
    }

    public function select_feeship(){
        $feeship = Ship::orderby('ship_id','DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
			<table class="table table-bordered">
				<thread>
					<tr>
						<th>Tên thành phố</th>
						<th>Tên quận huyện</th>
						<th>Tên xã phường</th>
						<th>Phí ship</th>
					</tr>
				</thread>
				<tbody>
				';

        foreach($feeship as $key => $fee){

            $output.='
					<tr>
						<td>'.$fee->city_id.'</td>
						<td>'.$fee->district_id.'</td>
						<td>'.$fee->village_id.'</td>
						<td contenteditable data-feeship_id="'.$fee->ship_id.'" class="fee_feeship_edit">'.number_format($fee->ship_feeship,0,',','.').'</td>
					</tr>
					';
        }

        $output.='
				</tbody>
				</table></div>
				';

        echo $output;

    }
    public function insert_ship(Request $request){
        $data = $request->all();
        $fee_ship = new Ship();
        $fee_ship->city_id = $data['city'];
        $fee_ship->district_id = $data['district'];
        $fee_ship->village_id = $data['village'];
        $fee_ship->ship_feeship = $data['fee_ship'];
        $fee_ship->save();
    }
    public function select_ship(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="city"){
                $select_district = District::where('city_id',$data['ma_id'])->orderby('district_id','ASC')->get();
                $output.='<option>---Chọn quận huyện---</option>';
                foreach($select_district as $key => $district){
                    $output.='<option value="'.$district->district_id.'">'.$district->district_name.'</option>';
                }

            }else{

                $select_village = Village::where('district_id',$data['ma_id'])->orderby('village_id','ASC')->get();
                $output.='<option>---Chọn xã phường---</option>';
                foreach($select_village as $key => $village){
                    $output.='<option value="'.$village->village_id.'">'.$village->village_name.'</option>';
                }
            }
            echo $output;
        }

    }
    public function ship(){
        $city = City::orderby('city_id','ASC')->get();
        return view('admin.ship.ship')->with(compact('city'));
    }
}
