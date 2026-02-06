<?php
/**
 * Ejemplo conceptual de conexión y autenticación LDAP en PHP
 *
 * Este archivo demuestra, de forma no funcional y educativa,
 * cómo una aplicación web en PHP podría conectarse a un servidor LDAP,
 * autenticar un usuario y realizar una búsqueda en el directorio.
 *
 * @author mlc0056-png
 * @date 2026-02-05
 * @package Application
 */

/**
 * Dirección del servidor LDAP
 *
 * @var string
 */
$ldap_host = "ldap://localhost";

/**
 * Puerto del servidor LDAP
 *
 * @var int
 */
$ldap_port = 389;

/**
 * DN base del directorio LDAP
 *
 * @var string
 */
$ldap_dn = "dc=devwebpro,dc=local";

/**
 * DN completo del usuario LDAP
 *
 * @var string
 */
$ldap_user = "uid=usuario,ou=developers,dc=devwebpro,dc=local";

/**
 * Contraseña del usuario LDAP
 *
 * @var string
 */
$ldap_pass = "tu_contraseña_segura";

/**
 * Conexión al servidor LDAP
 *
 * @var resource|false
 */
$ldap_conn = ldap_connect($ldap_host, $ldap_port);

/**
 * Verificación de la conexión LDAP
 */
if (!$ldap_conn) {
    echo "No se pudo conectar al servidor LDAP";
    exit;
}

/**
 * Configuración del protocolo LDAP
 *
 * Se establece la versión 3 del protocolo LDAP,
 * que es la más utilizada actualmente.
 */
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);

/**
 * Autenticación del usuario mediante bind LDAP
 *
 * Se intenta autenticar al usuario contra el servidor LDAP
 * utilizando sus credenciales.
 */
if (@ldap_bind($ldap_conn, $ldap_user, $ldap_pass)) {
    echo "Usuario autenticado correctamente (concepto)";
} else {
    echo "Fallo en la autenticación (concepto)";
}

/**
 * Búsqueda de un usuario en el directorio LDAP
 *
 * Se realiza una búsqueda utilizando el atributo uid
 * como ejemplo de consulta LDAP.
 *
 * @var resource|false $search
 */
$search = ldap_search($ldap_conn, $ldap_dn, "(uid=usuario)");

/**
 * Obtención de los resultados de la búsqueda LDAP
 *
 * @var array $result
 */
$result = ldap_get_entries($ldap_conn, $search);

/**
 * Mostrar resultados de la búsqueda LDAP
 */
echo "<pre>";
print_r($result);
echo "</pre>";

/**
 * Cierre de la conexión LDAP
 */
ldap_unbind($ldap_conn);
?>
