# SideKick Web App 🌐

Aplicación web desarrollada en PHP y desplegada en Vercel, diseñada para gestionar la activación de cuentas de usuario mediante tokens y ofrecer una landing page informativa del ecosistema SideKick.

## 🚀 Funcionalidades principales

- **Activación de Cuenta**: Activación de usuarios mediante un token recibido por URL y validado contra la API del servidor.
- **Landing Page Informativa**: Página de presentación con información sobre la aplicación SideKick.

## 🛠️ Stack Tecnológico

- **Frontend**:
    - **HTML**: Estructura principal de la aplicación.
    - **CSS**: Estilos personalizados.
    - **Bootstrap**: Componentes UI y diseño responsivo.
    - **Bootstrap Icons** y **Font Awesome**: Íconos vectoriales.
    - **Google Fonts (Inter)**: Tipografía principal.

- **Backend**:
    - **PHP**: Lógica del lado del servidor para activación y manejo de endpoints.

- **Despliegue**:
    - **Vercel**: Hosting serverless y manejo automático de rutas `/api`.

## 💻 Estructura del Proyecto

```
├── api/ # Endpoints manejados desde Vercel (serverless)
│ ├── activate.php # Lógica de activación de cuentas por token
│ └── index.php # Landing page informativa
├── css/
│ └── styles.css # Estilos personalizados
├── vercel.json # Configuración para despliegue en Vercel
└── README.md # Documentación del proyecto
```

## 📌 Requisitos Previos

- **PHP** (instalado y configurado en tu máquina)
- **cURL** habilitado en la configuración de PHP

## 📦 Instalación y Ejecución

1. **Iniciar un servidor local**

```bash
php -S localhost:8000
```

2. **Acceder a la aplicación**

Abrir en el navegador:

```
http://localhost:8000/api/index.php
```