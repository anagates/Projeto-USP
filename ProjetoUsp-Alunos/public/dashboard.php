
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Painel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Painel</a>
    <div class="d-flex">
      <span class="navbar-text text-white me-3">Olá, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
      <a class="btn btn-outline-light btn-sm" href="?logout=1">Sair</a>
    </div>
  </div>
</nav>

<div class="container my-4">
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6>Total Emails</h6>
                    <h3 id="metric-emails"><?php echo $metrics['emails']; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6>Total Usuários</h6>
                    <h3 id="metric-usuarios"><?php echo $metrics['usuarios']; ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6>Total Posts</h6>
                    <h3 id="metric-posts"><?php echo $metrics['posts']; ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabs for CRUDs -->
    <ul class="nav nav-tabs" id="crudTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="emails-tab" data-bs-toggle="tab" data-bs-target="#emails" type="button" role="tab">Newsletter</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="usuarios-tab" data-bs-toggle="tab" data-bs-target="#usuarios" type="button" role="tab">Usuários</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts" type="button" role="tab">Posts</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="logs-tab" data-bs-toggle="tab" data-bs-target="#logs" type="button" role="tab">Logs</button>
      </li>
    </ul>
    <div class="tab-content p-3 border border-top-0" id="crudTabsContent">
        <div class="tab-pane fade show active" id="emails" role="tabpanel">
            <div class="d-flex justify-content-between mb-2">
                <h5>Newsletter Emails</h5>
                <button class="btn btn-sm btn-primary" id="btnAddEmail">Novo</button>
            </div>
            <div id="table-emails"></div>
        </div>

        <div class="tab-pane fade" id="usuarios" role="tabpanel">
            <div class="d-flex justify-content-between mb-2">
                <h5>Usuários</h5>
                <button class="btn btn-sm btn-primary" id="btnAddUsuario">Novo</button>
            </div>
            <div id="table-usuarios"></div>
        </div>

        <div class="tab-pane fade" id="posts" role="tabpanel">
            <div class="d-flex justify-content-between mb-2">
                <h5>Posts</h5>
                <button class="btn btn-sm btn-primary" id="btnAddPost">Novo</button>
            </div>
            <div id="table-posts"></div>
        </div>

        <div class="tab-pane fade" id="logs" role="tabpanel">
            <h5>Logs recentes</h5>
            <div id="table-logs"></div>
        </div>
    </div>
</div>

<!-- Modals: Email Edit/Create -->
<div class="modal fade" id="modalEmail" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formEmail">
      <div class="modal-header">
        <h5 class="modal-title">Email</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="email-id">
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" id="email-email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Página origem</label>
            <input type="text" name="pagina_origem" id="email-pagina" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">User agent</label>
            <textarea name="user_agent" id="email-ua" class="form-control" rows="2"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Usuario -->
<div class="modal fade" id="modalUsuario" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formUsuario">
      <div class="modal-header">
        <h5 class="modal-title">Usuário</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="usuario-id">
        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" id="usuario-nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input type="email" name="email" id="usuario-email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Cargo</label>
            <input type="text" name="cargo" id="usuario-cargo" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Ativo</label>
            <select name="ativo" id="usuario-ativo" class="form-select"><option value="1">Sim</option><option value="0">Não</option></select>
        </div>
        <div class="mb-3" id="usuario-senha-row">
            <label class="form-label">Senha (apenas ao criar)</label>
            <input type="password" name="senha" id="usuario-senha" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Post -->
<div class="modal fade" id="modalPost" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="formPost">
      <div class="modal-header">
        <h5 class="modal-title">Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id" id="post-id">
        <div class="mb-3">
            <label class="form-label">Título</label>
            <input type="text" name="titulo" id="post-titulo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Resumo</label>
            <textarea name="resumo" id="post-resumo" class="form-control" rows="2"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Conteúdo</label>
            <textarea name="conteudo" id="post-conteudo" class="form-control" rows="6" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" id="post-slug" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Autor (ID)</label>
            <input type="number" name="autor_id" id="post-autor" class="form-control">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="1" id="post-publicado" name="publicado">
            <label class="form-check-label">Publicado</label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const apiUrl = '../controllers/DashboardController.php';

async function loadEmails(){
    const res = await fetch(apiUrl+'?action=newsletter_list');
    const data = await res.json();
    let html = '<table class="table table-sm"><thead><tr><th>#</th><th>Email</th><th>Origem</th><th>Cadastrado</th><th></th></tr></thead><tbody>';
    data.forEach(r=>{
        html += `<tr><td>${r.id_email}</td><td>${r.email}</td><td>${r.pagina_origem||''}</td><td>${r.data_cadastro}</td><td><button class="btn btn-sm btn-outline-primary me-1" onclick="editEmail(${r.id_email})">Editar</button><button class="btn btn-sm btn-outline-danger" onclick="confirmDelete('newsletter',${r.id_email})">Excluir</button></td></tr>`;
    });
    html += '</tbody></table>';
    document.getElementById('table-emails').innerHTML = html;
}

async function loadUsuarios(){
    const res = await fetch(apiUrl+'?action=usuarios_list');
    const data = await res.json();
    let html = '<table class="table table-sm"><thead><tr><th>#</th><th>Nome</th><th>Email</th><th>Cargo</th><th>Ativo</th><th></th></tr></thead><tbody>';
    data.forEach(r=>{
        html += `<tr><td>${r.id_usuario}</td><td>${r.nome}</td><td>${r.email}</td><td>${r.cargo}</td><td>${r.ativo?"Sim":"Não"}</td><td><button class="btn btn-sm btn-outline-primary me-1" onclick="editUsuario(${r.id_usuario})">Editar</button><button class="btn btn-sm btn-outline-danger" onclick="confirmDelete('usuarios',${r.id_usuario})">Excluir</button></td></tr>`;
    });
    html += '</tbody></table>';
    document.getElementById('table-usuarios').innerHTML = html;
}

async function loadPosts(){
    const res = await fetch(apiUrl+'?action=posts_list');
    const data = await res.json();
    let html = '<table class="table table-sm"><thead><tr><th>#</th><th>Título</th><th>Autor</th><th>Publicado</th><th></th></tr></thead><tbody>';
    data.forEach(r=>{
        html += `<tr><td>${r.id_post}</td><td>${r.titulo}</td><td>${r.autor_nome||r.autor_id||''}</td><td>${r.publicado?"Sim":"Não"}</td><td><button class="btn btn-sm btn-outline-primary me-1" onclick="editPost(${r.id_post})">Editar</button><button class="btn btn-sm btn-outline-danger" onclick="confirmDelete('posts',${r.id_post})">Excluir</button></td></tr>`;
    });
    html += '</tbody></table>';
    document.getElementById('table-posts').innerHTML = html;
}

async function loadLogs(){
    const res = await fetch(apiUrl+'?action=logs_list');
    const data = await res.json();
    let html = '<table class="table table-sm"><thead><tr><th>#</th><th>Usuário</th><th>Ação</th><th>Entidade</th><th>Detalhes</th><th>Data</th></tr></thead><tbody>';
    data.forEach(r=>{
        html += `<tr><td>${r.id_log}</td><td>${r.nome||r.usuario_id}</td><td>${r.acao}</td><td>${r.entidade} (${r.entidade_id})</td><td>${r.detalhes}</td><td>${r.data_hora}</td></tr>`;
    });
    html += '</tbody></table>';
    document.getElementById('table-logs').innerHTML = html;
}

function confirmDelete(type,id){
    if (!confirm('Tem certeza que deseja excluir o registro?')) return;
    let form = new FormData();
    form.append('id', id);
    fetch(apiUrl + '?action='+type+'_delete', {method:'POST', body: form}).then(r=>r.json()).then(res=>{
        if(res.ok){
            loadAll();
        } else alert('Erro ao excluir');
    });
}

// Email handlers
function openEmailModal(){
    document.getElementById('formEmail').reset();
    document.getElementById('email-id').value = '';
    new bootstrap.Modal(document.getElementById('modalEmail')).show();
}

async function editEmail(id){
    const res = await fetch(apiUrl+'?action=newsletter_get&id='+id);
    const r = await res.json();
    document.getElementById('email-id').value = r.id_email;
    document.getElementById('email-email').value = r.email;
    document.getElementById('email-pagina').value = r.pagina_origem || '';
    document.getElementById('email-ua').value = r.user_agent || '';
    new bootstrap.Modal(document.getElementById('modalEmail')).show();
}

document.getElementById('btnAddEmail').addEventListener('click', openEmailModal);

document.getElementById('formEmail').addEventListener('submit', function(e){
    e.preventDefault();
    const form = new FormData(this);
    const id = form.get('id');
    const action = id? 'newsletter_update' : 'newsletter_create';
    fetch(apiUrl+'?action='+action, {method:'POST', body: form}).then(r=>r.json()).then(res=>{
        if(res.ok){
            bootstrap.Modal.getInstance(document.getElementById('modalEmail')).hide();
            loadEmails();
            loadMetrics();
        } else alert('Erro');
    });
});

// Usuarios handlers
function openUsuarioModal(){
    document.getElementById('formUsuario').reset();
    document.getElementById('usuario-id').value = '';
    document.getElementById('usuario-senha-row').style.display = 'block';
    new bootstrap.Modal(document.getElementById('modalUsuario')).show();
}

async function editUsuario(id){
    const res = await fetch(apiUrl+'?action=usuarios_get&id='+id);
    const r = await res.json();
    document.getElementById('usuario-id').value = r.id_usuario;
    document.getElementById('usuario-nome').value = r.nome;
    document.getElementById('usuario-email').value = r.email;
    document.getElementById('usuario-cargo').value = r.cargo;
    document.getElementById('usuario-ativo').value = r.ativo?1:0;
    document.getElementById('usuario-senha-row').style.display = 'none';
    new bootstrap.Modal(document.getElementById('modalUsuario')).show();
}

document.getElementById('btnAddUsuario').addEventListener('click', openUsuarioModal);

document.getElementById('formUsuario').addEventListener('submit', function(e){
    e.preventDefault();
    const form = new FormData(this);
    const id = form.get('id');
    // if creating, hash the password in PHP endpoint; here send plain and let server hash
    const action = id? 'usuarios_update' : 'usuarios_create';
    fetch(apiUrl+'?action='+action, {method:'POST', body: form}).then(r=>r.json()).then(res=>{
        if(res.ok){
            bootstrap.Modal.getInstance(document.getElementById('modalUsuario')).hide();
            loadUsuarios();
            loadMetrics();
        } else alert('Erro');
    });
});

// Posts handlers
function openPostModal(){
    document.getElementById('formPost').reset();
    document.getElementById('post-id').value = '';
    new bootstrap.Modal(document.getElementById('modalPost')).show();
}

async function editPost(id){
    const res = await fetch(apiUrl+'?action=posts_get&id='+id);
    const r = await res.json();
    document.getElementById('post-id').value = r.id_post;
    document.getElementById('post-titulo').value = r.titulo;
    document.getElementById('post-resumo').value = r.resumo;
    document.getElementById('post-conteudo').value = r.conteudo;
    document.getElementById('post-slug').value = r.slug;
    document.getElementById('post-autor').value = r.autor_id;
    document.getElementById('post-publicado').checked = r.publicado?true:false;
    new bootstrap.Modal(document.getElementById('modalPost')).show();
}

document.getElementById('btnAddPost').addEventListener('click', openPostModal);

document.getElementById('formPost').addEventListener('submit', function(e){
    e.preventDefault();
    const form = new FormData(this);
    // checkbox handling
    form.set('publicado', document.getElementById('post-publicado').checked?1:0);
    const id = form.get('id');
    const action = id? 'posts_update' : 'posts_create';
    fetch(apiUrl+'?action='+action, {method:'POST', body: form}).then(r=>r.json()).then(res=>{
        if(res.ok){
            bootstrap.Modal.getInstance(document.getElementById('modalPost')).hide();
            loadPosts();
            loadMetrics();
        } else alert('Erro');
    });
});

async function loadMetrics(){
    const res = await fetch(apiUrl+'?action=metrics');
    const m = await res.json();
    document.getElementById('metric-emails').innerText = m.emails;
    document.getElementById('metric-usuarios').innerText = m.usuarios;
    document.getElementById('metric-posts').innerText = m.posts;
}

function loadAll(){
    loadEmails();
    loadUsuarios();
    loadPosts();
    loadLogs();
}

loadAll();
</script>
</body>
</html>

