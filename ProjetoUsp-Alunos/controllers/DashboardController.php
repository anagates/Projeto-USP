<?php
    require_once __DIR__ . '/../models/NewsletterModel.php';
    require_once __DIR__ . '/../models/UsuarioModel.php';
    require_once __DIR__ . '/../models/PostsModel.php';
    require_once __DIR__ . '/../models/LogsModel.php';
 
    class DashboardController {
        private $newsletterModel;
        private $usuarioModel;
        private $postsModel; // ficara para v2
        private $logsModel;
 
        public function __construct() {
            $this->newsletterModel = new NewsletterModel();
            $this->usuarioModel = new UsuarioModel();
            $this->postsModel = new PostsModel();
            $this->logsModel = new LogsModel();
        }
 
        // Metricas
        public function metrics() { // quem quiser pode trocar o nome
            return [
                'emails' => $this->newsletterModel->countAll(),
                'usuarios' => $this->usuarioModel->countAll(),
                'posts' => $this->postsModel->countAll(),
            ];
        }
 
        // CRUD (create read update delete) dos emails de newslatter
        public function newsletter_list() {
            // Retorna todos os registros da newsletter em formato JSON
            echo json_decode($this->newsletterModel->all());
        }
 
        public function newsletter_get($id) {
            // Retorna todos os registros da newsletter em formato JSON
            echo json_decode($this->newsletterModel->get($id));
        }
 
        // criação manual
        public function newsletter_create($data) {
            // Cria um novo registro na newsletter com email, página de origem e user agent
            $ok = $this->newsletterModel->create(
                $data['email'],
                $data['pagina_origem'] ?? null,
                $data['user_agent'] ?? null,
            );
            // Retorna sucesso ou falha em JSON
            echo json_encode(['ok' => (bool)$ok]);
        }
 
        public function newsletter_update($id, $data) {
            // Atualiza um registro existente da newsletter pelo ID
            $ok = $this->newsletterModel->update(
                $id,
                $data['email'],
                $data['pagina_origem'] ?? null,
                $data['user_agent'] ?? null
            );
            // Retorna sucesso ou falha em JSON
            echo json_encode(['ok' => (bool)$ok]);
        }
 
        public function newsletter_delete($id) {
            // Exclui um registro da newsletter pelo ID
            $ok = $this->newsletterModel->delete($id);
 
            // Retorna sucesso ou falha em JSON
            echo json_encode(['ok' => (bool)$ok]);
        }
 
 
        // listar usuarios
        // Lista todos os usuarios
        public function usuarios_list() {
            echo json_encode($this->usuarioModel->all());
        }
 
        // Retorna um usuário específico pelo ID
        public function usuarios_get($id) {
            echo json_encode($this->usuarioModel->get($id));
        }

        public function usuarios_create($data){
            $ok = $this->usuarioModel->create(
                $data['nome'],
                $data['email'],
                $data['senha_hash'],
                $data['cargo'] ?? 'editor',
                $data['ativo'] ?? 1

            );
            echo json_encode(['ok' => (bool)$ok]);
        }

        public function usuarios_update($id, $data){
            $ok = $this->usuarioModel->update(
                $id,
                $data['nome'],
                $data['email'],
                $data['senha_hash'],
                $data['cargo'] ?? 'editor',
                $data['ativo'] ?? 1

            );
            echo json_encode(['ok' => (bool)$ok]);
        }

        public function usuarios_delete($id){
            $ok = $this->usuarioModel->delete($id);
            echo json_encode(['ok' => (bool)$ok]);
        }

        
    }
?>