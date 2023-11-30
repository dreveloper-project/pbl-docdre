<?php
class About extends Controller
{
    public function index($nama = "unknown", $pekerjaan = 'unknown') {
        $data['users'] = $this->Model('About_Model')->getData();
        $this->View('about/index', $data);
    }
}

?>