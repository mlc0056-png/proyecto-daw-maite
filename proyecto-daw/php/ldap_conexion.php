<?php
/**
 * Autor: mlc0056-png
 * Fecha: 2026-02-05
 */

$ldap_host = "ldap://localhost";
$ldap_port = 389;
$ldap_dn = "dc=devwebpro,dc=local"; // DN base
$ldap_user = "uid=usuario,ou=developers,dc=devwebpro,dc=local";
$ldap_pass = "tu_contraseña_segura";

// Concepto: conexión LDAP
$ldap_conn = ldap_connect($ldap_host, $ldap_port);

if (!$ldap_conn) {
    echo "No se pudo conectar al servidor LDAP";
    exit;
}

// Configuración básica
ldap_set_option($ldap_conn, LDAP_OPT_PROTOCOL_VERSION, 3);

// Concepto: autenticación bind
if (@ldap_bind($ldap_conn, $ldap_user, $ldap_pass)) {
    echo "Usuario autenticado correctamente (concepto)";
} else {
    echo "Fallo en la autenticación (concepto)";
}

// Concepto: búsqueda de usuario
$search = ldap_search($ldap_conn, $ldap_dn, "(uid=usuario)");
$result = ldap_get_entries($ldap_conn, $search);

echo "<pre>";
print_r($result);
echo "</pre>";

// Cerrar conexión
ldap_unbind($ldap_conn);
?>
