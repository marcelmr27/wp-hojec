<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'hojec' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*9n.^wu;Dbf,_u;T9gv9|PPI14,RWcWBKxe<HPER2<=r:#E]=s~~f?*yo&#C?MN`' );
define( 'SECURE_AUTH_KEY',  'WGO%4-+z4qsuk](rTcBd9@o!J%b~PbL0^aD|n2zrunh&D.J[uUZAphl:NW|uaif2' );
define( 'LOGGED_IN_KEY',    '+HEkRA^rk!TG[s?hAPSh6Kj7F_FpZ6>6l5S05WWBG1vH?5S-ECd$MMe:Q,KvMj_K' );
define( 'NONCE_KEY',        '{,_ecMqJ78]]irkHV&Xi==8??4c8/EO`h^IIk)6#Vam{Cp@Ig&%I%+# zcMwmgs~' );
define( 'AUTH_SALT',        'v{n6H<o[eX9`&<MeprT=kEd`:K_fY-]gTJoS.XE!v(M3$/6hmvjKq3V9WVOL&Sxh' );
define( 'SECURE_AUTH_SALT', 'avVNfjH,]X#P@kb@5u7+sW:Z/%f{#/3EfP+E6<rB;,;lp|P5y2u4N5dC4Cgv]@*L' );
define( 'LOGGED_IN_SALT',   '+hYQic`=`#I(!ee[2x,W{5vRZqG}Xsu:%7<m4P&T6V}<$H!jd(vvt5E?Np!XBE>K' );
define( 'NONCE_SALT',       'BnO=TZ{a1]5kvk olhgNUPNsHFq3KA0B[Tk*Hh68_q+6VG|DR)oAY9kW,ukra>vF' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wphjcn21_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
