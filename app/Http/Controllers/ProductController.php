<?php

namespace App\Http\Controllers;


require_once __DIR__ . '/../../../vendor/autoload.php';
use Illuminate\Http\Request;
use Airtable;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $all = Airtable::table('furniture')->all();

        $data= json_decode($all,true);
        for($i = 0; $i < count($all); $i++){
            $vendor= $this-> findVendor($all[$i]['fields']['Vendor'][0]);
            array_push($data[$i]['fields']['Vendor'],["joinedVendor" => $vendor]);
        }
        json_encode($data);
        return $data;
    }

    public function findVendor($vendorId)
    {
        return Airtable::table('vendors')->find($vendorId);
    }
    public function findAllVendors(Request $request)
    {
        return  Airtable::table('vendors')->all();
    }
    public function findAllDesigners(Request $request)
    {
        return  Airtable::table('designers')->all();
    }

    public function findProduct($productId)
    {
        $product = Airtable::table('furniture')->find($productId);
        $vendor= $this-> findVendor($product['fields']['Vendor'][0]);
        array_push($product['fields']['Vendor'],["joinedVendor" => $vendor]);

        return $product;
    }
    public function findDesigner($designerId)
    {
        return Airtable::table('designers')->find($designerId);
    }

    public function findOnstock(Request $request)
    {
        $all = Airtable::table('furniture')->where('Units In Store',">",0)->get();
        $allStock = $all['records'];
        for($i = 0; $i < count($allStock); $i++){
            $vendor= $this-> findVendor($allStock[$i]['fields']['Vendor'][0]);
            array_push($allStock[$i]['fields']['Vendor'],["joinedVendor" => $vendor]);
        }
        return $allStock;
    }
    public function findByType($type)
    {
        $all = Airtable::table('furniture')->where('Type',"=",$type)->get();
        $all = $all['records'];

        for($i = 0; $i < count($all); $i++){
            $vendor= $this-> findVendor($all[$i]['fields']['Vendor'][0]);
            array_push($all[$i]['fields']['Vendor'],["joinedVendor" => $vendor]);
        }

        return $all;
    }
    public function priceRange($max)
    {
        $all = Airtable::table('furniture')->where('Unit Cost',"<=",$max)->get();
        $all = $all['records'];

        for($i = 0; $i < count($all); $i++){
            $vendor= $this-> findVendor($all[$i]['fields']['Vendor'][0]);
            array_push($all[$i]['fields']['Vendor'],["joinedVendor" => $vendor]);
        }

        return $all;
    }
    public function getMaxPrice()
    {
        $all = $this->index(Request());
        $prices= [];
        foreach ($all as $item){
            array_push($prices,$item['fields']['Unit Cost']);
        }
        return max($prices);
    }



}
