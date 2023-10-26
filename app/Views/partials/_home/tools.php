<div role="tabpanel" tabindex="0" class="tab-pane fade show active" id="v-pills-authentification">
    <h3 class="font-weight-bold mt-4 mt-md-0">Authentification</h3>
    <div class="mt-4">
        <p>L'authentification des utilisateurs est aussi simple que l'ajout d'un middleware d'authentification à votre route :</p>
        <pre><code class="language-php">
Route::middleware('session')
    ->get('/profile', ProfileController::class);</code></pre>
        <p>Une fois l'utilisateur authentifié, vous pouvez accéder à l'utilisateur authentifié via la fonction <code>auth</code>:</p>
        <pre><code class="language-php">
// Obtenez l'utilisateur actuellement authentifié...
$user = auth()->user();</code></pre>
        <p>Bien entendu, vous pouvez définir votre propre middleware d'authentification, vous permettant de personnaliser le processus d'authentification.</p>
        <p>Pour plus d'informations sur les fonctionnalités d'authentification, consultez la <a href="<?= link_to('docs.version', DEFAULT_VERSION, 'schild') ?>">documentation d'authentification</a> .</p>
    </div>
</div>

<div role="tabpanel" tabindex="0" class="tab-pane fade" id="v-pills-autorisation">
    <h3 class="font-weight-bold mt-4 mt-md-0">Autorisation</h3>
    <div class="mt-4">
        <p>Vous devrez souvent vérifier si un utilisateur authentifié est autorisé à effectuer une action spécifique. Avec le systèmes d'autorisation de BlitzPHP, c'est un jeu d'enfant :</p>
        <p>Commencez par utiliser le trait <code>Authorizable</code> dans votre entité <code>User</code>:</p>
        <pre><code class="language-php">
use BlitzPHP\Schild\Authorization\Traits\Authorizable;
            
Class UserEntity extends Entity 
{
    use Autorizable;
}       </code></pre>
        <p>Puis, il ne vous reste plus qu'à utiliser la méthode qui vous convient:</p>
        <pre><code class="language-php">
// Vérifier si un utilisateur est autorisé à effectuer une action spécifique.
if ($user->can('users.create')) {
    //
}

// Vérifie si l’utilisateur se trouve dans l’un des groupes transmis.
if (! $user->inGroup('superadmin', 'admin')) {
    //
}

// Vérifie si l’utilisateur dispose de l’autorisation définie directement sur lui-même.
if (! $user->hasPermission('users.create')) {
    //
}       </code></pre>
        <p>Vous pouvez aussi restreindre l’accès à une route ou à un groupe de route via un middleware</p>
        <pre><code class="language-php">
// Obtenez l'utilisateur actuellement authentifié...
Route::middleware('group:admin')->prefix('admin')->group(function(RouteBuilder $router) {
    $router->get('/', 'AdminController::index');

    $router->middleware('permission:users.manage')->group(function(RouteBuilder $router) {
        $router->presenter('Users')
    });
});     </code></pre>
        <p><a href="<?= link_to('docs.version', DEFAULT_VERSION, 'schild-autorisation') ?>">En savoir plus</a> .</p>
    </div>
</div>

<div role="tabpanel" tabindex="0" class="tab-pane fade" id="v-pills-validation">
    <h3 class="font-weight-bold mt-4 mt-md-0">Validation</h3>
    <div class="mt-4">
        <p>BlitzPHP vous met à votre dispose de plus de 100 règles de validation puissantes et intégrées pour rapidement valider vos données :</p>
        <pre><code class="language-php">
public function update()
{
    $validated = $this->request->validate([
        'email'    => 'required|email|unique:users',
        'password' => Password::required()->min(8)->uncompromised(),
    ]);
 
    auth()->user()->update($validated);
}       </code></pre>
        <p><a href="<?= link_to('docs.version', DEFAULT_VERSION, 'validation') ?>">En savoir plus</a> .</p>
    </div>
</div>

<div role="tabpanel" tabindex="0" class="tab-pane fade" id="v-pills-fichiers">
    <h3 class="font-weight-bold mt-4 mt-md-0">Stockage de fichier</h3>
    <div class="mt-4">
        <p>Avec sa couche d'abstraction robuste du système de fichiers, BlitzPHP fourni une API unique et unifiée pour interagir avec les systèmes de fichiers locaux et les systèmes de fichiers basés sur le cloud comme Amazon S3 :</p>
        <pre><code class="language-php">
$path = $this->request->file('avatar')->store('s3'); </code></pre>
        <p>Quel que soit l'endroit où vos fichiers sont stockés, interagissez avec eux en utilisant une syntaxe simple et élégante :</p>
        <pre><code class="language-php">
$content = Storage::get('photo.jpg');
 
Storage::put('photo.jpg', $content); </code></pre>
        <p><a href="<?= link_to('docs.version', DEFAULT_VERSION, 'fichiers') ?>">En savoir plus</a> .</p>
    </div>
</div>

<div role="tabpanel" tabindex="0" class="tab-pane fade" id="v-pills-migrations">
    <h3 class="font-weight-bold mt-4 mt-md-0">Migrations de base de données</h3>
    <div class="mt-4">
        <p>Les migrations sont comme un contrôle de version pour votre base de données, permettant à votre équipe de définir et de partager la définition du schéma de base de données de votre application :</p>
        <pre><code class="language-php">
public function up(): void
{
    $this->create('users', function (Structure $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamps();

        return $table;
    });
}       </code></pre>
        <p><a href="<?= link_to('docs.version', DEFAULT_VERSION, 'migrations') ?>">En savoir plus</a> .</p>
    </div>
</div>

