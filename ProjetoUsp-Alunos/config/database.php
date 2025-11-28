<?phpclass Database {

    private $conn;
    public function connect() {
        // CONFIGURAÇÕES DO BANCO DE DADOS
        $host = "localhost";          // Servidor do banco
        $dbname = "usp_site";         // Nome do banco
        $username = "root";           // Usuário do banco
        $password = "";               // Senha do banco
        // O bloco try/catch evita que erros apareçam na tela do usuário.
        try {
            // CRIA A CONEXÃO PDO
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", 
                                   $username, 
                                   $password);
            // ERRMODE_EXCEPTION faz o PDO lançar exceções ao invés de avisos.
            // Isso facilita o tratamento do erro e evita falhas silenciosas.
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // PDO::FETCH_ASSOC retorna resultados 
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // Caso tudo dê certo, os models usarão este retorno para executar
            return $this->conn;
        } 
//paramos no catch
catch (PDOException $e) {

            // EM CASO DE ERRO NA CONEXÃO, ESTA MENSAGEM É REGISTRADA NO LOG.
            // Não mostramos detalhes ao usuário por segurança.
            error_log("Erro na conexão PDO: " . $e->getMessage());

            // Encerrar execução de forma segura
            die("Erro ao conectar ao banco de dados.");
        }
    }
}
?>
