# 🚀 FireCore — Clean PHP Architecture 🔥

Framework PHP minimalista, baseado em Clean Architecture e princípios SOLID. Desenvolvido para quem busca uma arquitetura limpa, desacoplada, testável e fácil de manter.

## 🔥 Recursos

- ✅ Arquitetura Limpa (Clean Architecture)
- ✅ Princípios SOLID aplicados
- ✅ Sistema de Migrations isolado da aplicação
- ✅ Gerenciamento de rotas simples e intuitivo
- ✅ CSRF Token integrado para segurança
- ✅ Helpers globais e configuráveis
- ✅ Testes unitários com PHPUnit
- ✅ Totalmente desacoplado, fácil de escalar e manter
- ✅ Sem dependências pesadas, puro PHP moderno

## 🚀 Instalação

bash:
git clone https://github.com/SeuUsuario/Phoenix-Framework.git
cd FireCore
composer install

⚙️ Configure o arquivo (Source/Boot/Config.php) com os dados do seu ambiente.

🗺️ Rotas
As rotas ficam definidas em Source/Routes/web.php.
Exemplo:

$router->get("/", "HomeController@index");
$router->post("/billet", "BilletController@store");

🗄️ Migrations
Execute as migrations facilmente com o terminal:

Rodar todas: php migration.php migrate-all
Rollback de todas: php migration.php rollback-all
Rodar uma específica: php migration.php migrate users
Rollback de uma específica: php migration.php rollback users

🧪 Testes Unitários
Execute seus testes com PHPUnit:

./vendor/bin/phpunit --colors=always Source/Tests
✅ Exemplo de teste:

public function testCreateBillet(): void
{
    $billet = new Billet(rand(1, 9999), "PAGO", 10.50);
    $result = $this->repository->create($billet);

    $this->assertTrue($result, "Falha ao criar boleto");
}

🔒 Segurança
✔️ Sistema de CSRF Token nativo
✔️ Proteção contra execução de migrations em ambiente de produção (check no setUp dos testes)

✨ Futuro (Roadmap)

🔧 CLI para gerar Controllers, Models e Migrations
🌍 Suporte nativo à internacionalização (i18n)
🔗 Middleware para autenticação e segurança
📜 Validação automática de requests
🔥 Instalação via Composer (composer create-project)