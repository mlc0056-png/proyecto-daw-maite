# Proyecto DAW - Maite

Proyecto web básico funcional con estructura:
- index.html
- css/styles.css
- js/app.js
- php/conexion.php
- docs/

## Descripción
Proyecto de ejemplo para práctica de Git y GitHub.

## Integración con LDAP

Para autenticar usuarios del directorio LDAP:

- Se conectaría al servidor LDAP (host, puerto, DN base)
- Se realizaría un bind con el usuario y contraseña ingresados
- Si el bind es exitoso, el usuario queda autenticado
- Se pueden buscar atributos del usuario (nombre, email, grupo, etc.)
- Esto permite gestionar permisos y accesos en la aplicación web


