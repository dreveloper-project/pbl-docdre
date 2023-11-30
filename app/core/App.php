  <?php

class App
{

    // Default Property
    protected $controller =  "Home";
    protected $method = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this->parse_Url();

        // Logika pengecekan controller
        // path pertama (url[0]) akan dianggap controller 
        if (isset($url[0])) {
        if (file_exists("../app/controllers/" . $url[0] . ".php")) {
            // jika ada maka path akan ditetapkan sebagai controller
            $this->controller = $url[0];

            // jika controller telah ditetapkan, maka hapus dia dari url agar kita bisa ambil path berikutnya
            unset($url[0]);
        }
        }
        // ambil file controller dulu sebelum kita instance
        require_once "../app/controllers/" . $this->controller . ".php";

        // kode dibawah ini tidak akan jalan tanpa require file class controllernya
        $this->controller = new $this->controller;
       
        // Logika Pengecekan Method 
        if(isset($url[1])){

            // Jika path kedua ada maka lakukan pengecekan path itu apakah adayang sesuai namanya dengan method di controller
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                
                unset($url[1]);
            }

        }
        
        // Logika Pengecekan parameter
        if (!empty($url)) {
           $this->params = array_values($url);
           
        }


        // Jalankan Controller & Method serta params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params );

    }

    public function parse_Url()
    {

        if (isset( $_GET["url"] )) {
            
            // menghapus slash paling belakang
            $url = rtrim($_GET["url"], '/');

            // membersihkan url dari karakter berpotensi merusak celah keamanan
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // memecah path berdasarkan slash
            $url = explode('/', $url);

            return $url;
        }

    }
}
