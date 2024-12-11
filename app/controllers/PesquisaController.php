
<?php
class PesquisaController {
    public function index() {
        
        include  './app/shared/components/nav/navbar.php';
        require_once './app/views/pesquisar/pesquisar.php';
        include  './app/shared/components/footer/footer.php';
    }
}
?>