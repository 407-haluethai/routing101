<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class ProductController extends Controller
{
//เก็บข้อมูลสินค้า
    private $products = [
        [
            'id' => 1,
            'name' => 'Christmas',
            'description' => 'ต้อนรับเทศกาลคริสต์มาสอย่างอบอุ่นด้วยกลิ่นหอมละมุนจากแมกไม้นานาชนิด ทำให้รู้สึกเหมือนคุณกำลังเดินเล่นในป่าที่ถูกปกคลุมไปด้วยหิมะ มาพร้อมแพคเกจจิ้งสุดคิวต์ที่ใครเห็นเป็นต้องตกหลุมรัก',
            'price' => 50 ,
            'images' => 'https://i.pinimg.com/236x/78/4c/b8/784cb8dc8790c8a04266370d633704cd.jpg'

        ],
        [
            'id' => 2,
            'name' => 'Winter',
            'description' => 'กลิ่น A Winter ผสมผสานกลิ่นจากแอปเปิ้ล เข้ากับซินาม่อน และสมุนไพรหอมตามแบบฉบับ The Moose Scented ให้กลิ่นหอม อบอุ่น เหมาะกับฤดูหนาว หรืองานปาร์ตี้แสนอบอุ่น',
            'price' => 50 ,
            'images' => 'https://i.pinimg.com/236x/65/ec/86/65ec86ea66bfc1bacab7e92581654fd8.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Lavender',
            'description' => 'กลิ่นยอดฮิตของเทียนหอมอย่างกลิ่นลาเวนเดอร์ โดยกลิ่นนี้ส่งผลต่อระบบประสาท มีคุณสมบัติช่วยลดความเครียด ช่วยให้นอนหลับดีขึ้น เหมาะอย่างยิ่งสำหรับผู้ที่ต้องการบรรยากาศเงียบสงบในห้องนอน ชวนให้เคลิ้มหลับสบายทุกคืน กลิ่นลาเวนเดอร์ยังเป็นที่นิยมในการใช้งานสปาและ Aroma Therapy (อโรมาเธอราพี) ช่วยปลอบประโลมใจ ทำให้รู้สึกสบาย หลับลึก และสดชื่นในเช้าวันถัดไป',
            'price' => 30 ,
            'images' => 'https://i.pinimg.com/236x/d2/36/f0/d236f0a7081a684e9f572069c55a1a03.jpg'
        ],
        [
            'id' => 4,
            'name' => 'Orange',
            'description' => 'เทียนหอม Dior Jardin D Orangers เทียนหอมกลิ่นผลไม้นี้อธิบายถึงการเดินในสวนส้มใน Vallauris กลิ่นอายของแสงพระอาทิย์ผสมผสานกับดอกส้มอันแสนนุ่มนวลรวมถึงความชุ่มฉ่ำของผลไม้ตละกูลส้มเพื่อสร้างความนุ่มและบรรยากาศอันแสนสบาย',
            'price' => 30,
            'images' => 'https://i.pinimg.com/236x/1e/1c/b7/1e1cb70fdc9e92741c4f494ce21c5cb9.jpg'
        ],
        [
            'id' => 5,
            'name' => 'Peachy Blossom',
            'description' => 'กลิ่นพีช Peachy Blossom
ผสานกลิ่นหอมจากผลพีช 2 สายพันธ์ุเข้าด้วยกัน ให้กลิ่นหอมหวานซ่อนเปรี้ยว พร้อมเติมแต่งความหอมละมุนจากดอกพีช Peach Blossom ให้ได้เทียนหอม Peachy Blossom ตามแบบฉบับของ The Moose Scented ทำให้พื้นที่ของคุณ เมื่อจุดเทียนหอมจะหวานสดชื่นไปด้วยกลิ่นพีช เหมาะสำหรับจุดตกแต่งบ้าน คอนโด ร้านค้า และทำสปาด้วยกลิ่นหอมด้วยตัวคุณเอง',
            'price' => 30,
            'images' => 'https://i.pinimg.com/236x/44/a9/06/44a90617b47dfeadf117916382e3dc35.jpg'
        ],
        [
            'id' => 6,
            'name' => 'Rose',
            'description' => 'มีจุดประสงค์เพื่อที่จะสร้างกลิ่นกุหลาบอันเย้ายวนใจโดยการผสมผสานเข้ากับอำพันทะเล ซึ่งเป็นสองอย่างที่เป็นส่วนผสมหลักของผู้ผลิตน้ำหอม ความสอดคล้องในครั้งนี้สำคัญสำหรับผมเป็นอย่างมาก ผมใช้เวลาอยู่หลายปีกว่านี้จะสร้างเทียนหอม Dior Ambre Nuit ขึ้นสำเร็จ',
            'price' => 30,
            'images' => 'https://i.pinimg.com/236x/9c/bf/05/9cbf05ca79292d2c9b1ac977b228a95f.jpg'
        ],
        [
            'id' => 7,
            'name' => 'Sakura',
            'description' => 'กลีบดอกไม้บานอันแสนบอบบางจากต้นซากุระ (เชอรี่ญี่ปุ่น) มักถูกกล่าวขวัญว่าเป็นเกล็ดหิมะแห่งฤดูใบไม้ร่วงโดยนักกวีญี่ปุ่น สำหรับชาวญี่ปุ่นแล้ว ซากุระถือเป็นสัญลักษณ์แหล่งการกำเนิดใหม่ของธรรมชาติและความบริสุทธิ์นับตั้งแต่สมัยโบราณ กลิ่นหอมอันอ่อนโยนช่วยให้ผ่อนคลายได้อย่างน่าอัศจรรย์',
            'price' => 30,
            'images' => 'https://i.pinimg.com/236x/d2/a5/db/d2a5dbde3ee890842256d917db27e1e1.jpg'
        ],
        [
            'id' => 8,
            'name' => 'Cinamon',
            'description' => 'เติมกลิ่นหอมคริสต์มาสอันอบอุ่นและชวนเชิญให้บ้านของคุณด้วยเทียนหอมกลิ่นแมนดาริน กานพลู และอบเชย เทียนขนาดกลางนี้บรรจุอยู่ในขวดแก้วทรงสันนูนสุดเก๋ เหมาะสำหรับเพิ่มสัมผัสแห่งเทศกาลให้กับการตกแต่งบ้านของคุณ',
            'price' => 30,
            'images' => 'https://i.pinimg.com/236x/8e/a2/b3/8ea2b39e75cd0cebba56329446083e4c.jpg'
        ],
        [
            'id' => 9,
            'name' => 'Lemon',
            'description' => ' กลิ่นมะนาวผสมมะกรูด Lemon & Bergamot Candle ... ผสมผสานกลิ่นหอมสมุนไพรจากน้ำมันมะกรูด และความหอมหวานอมเปรี้ยวจากเลม่อนสีเหลือง ให้กลิ่นหวานซ้อนเปรี้ยว ผ่อนคลาย',
            'price' => 30,
            'images' => 'https://i.pinimg.com/236x/72/7f/8a/727f8a22ef508087f732cfbd497b6fec.jpg'

        ],
        [
            'id' => 10,
            'name' => 'Honey',
            'description' => 'ดื่มด่ำกับกลิ่นหอมอันเงียบสงบของเทียนหอม LOEWE Honeysuckle Candle ที่จะเติมเต็มความหรูหราให้กับบ้านของคุณ เทียนหอมที่ประดิษฐ์อย่างประณีตนี้ให้กลิ่นหอมที่ผ่อนคลายและหอมหวานอ่อนๆ เหมาะสำหรับสร้างบรรยากาศที่ผ่อนคลาย สัมผัสความหรูหราของขี้ผึ้งธรรมชาติและภาชนะดินเผาเคลือบ',
            'price' => 30,
            'images' => 'https://i.pinimg.com/236x/2f/68/72/2f6872e80f087c5f9628275ab0158ea8.jpg'
        ],
    ];



    /**
     * Display a listing of the resource.
     * แสดงสินค้าทั้งหมด
     */
    public function index()
    {
        return Inertia::render('Products/Index', ['products' => $this->products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *แสดงรายละเอียดสินค้า
     */
    public function show(string $id)
    {
        $product = collect($this->products)->firstWhere('id', $id);//ค้นหาสินค้าที่ตรงกับid

        if (!$product) {
        abort(404, 'Product not found');
    }
        return Inertia::render('Products/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
