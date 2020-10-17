<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . '/../../../vendor/autoload.php';


class MailController extends Controller {

    public function attachment_email($itemId) {

        $this->pdfGenerator($itemId);
        $data = array();
        Mail::send('mail',  $data, function($message) {
            $dataJson = new UserController();
            $user = json_decode($dataJson->isLogged()->getContent(),true);
            $name = $user['user']['records'][0]['fields']['First Name'];
            $email = $user['user']['records'][0]['fields']['email'];
            $message->to($email, $name)->subject
            ('Resonance E-Commerce - Product Details');
            $message->setCc('techpirates@resonance.nyc' , 'Resonance Tech Team');
            $message->attach('C:\Users\Eva\Desktop\END Tech\Resonance\resonance\public\product.pdf');
            $message->from('resonance.assigment@gmail.com','Resonance E-commerce');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }

    private function renderImg($item){
        $imgTag ="";
        foreach ($item['fields']["Picture"] as $pic){
            $imgTag .= "<img src=' {$pic['url']}' /> <br>";
        }
        return $imgTag;
    }

    public function pdfGenerator($itemId)
    {
        $productController = new ProductController();

        $item = $productController -> findProduct($itemId);
        $vendor = $productController->findVendor($item['fields']['Vendor'][0]);
        $designer = array_key_exists('Designer', $item['fields'])?
            $productController->findDesigner($item['fields']['Designer'][0])['fields']['Name'] : "";

        $html = '<h2>'. $item ["fields"]["Name"].'</h2>'.
            '<p>'.$item ["fields"]["Description"].'</p>'.
            '<hr>'.
            '<h3>Product Details</h3>'.
            '<div class="col-sm-12">'.
            '<div class="col-sm-6">'.
            '<h4>Price</h4>'. $item ["fields"]["Unit Cost"].
            '<br>'.
            '<h4>Designer</h4>'. $designer.
            '<br>'.
            '<h4>Vendor</h4>'. $vendor['fields']['Name'].
            '<br>'.
            '<h4>Units in Store</h4>'. $item ["fields"]["Units In Store"].
            '<br>'.
            '</div>'.

            '<div class="col-sm-6">'.
            '<h4>Size</h4>'. $item ["fields"]['Size (WxLxH)'].
            '<br>'.
            '<h4>Setting</h4>'. implode(",",$item ["fields"]['Settings']).
            '<br>'.
            '<h4>Materials and Finishes</h4>'. implode(",",$item ["fields"]['Materials and Finishes']).
            '<br>'.
            '</div>'.
            '</div>'.
            '<hr>'.
            '<h3>Products Images</h3>'.
            $this->renderImg($item);


        $mpdf = new \Mpdf\Mpdf(['orientation' => 'P','tempDir' => __DIR__ . '/custom/temp/dir/path']);
        $mpdf->WriteHTML($html);

        $mpdf->Output("product.pdf",'F');

    }

}
