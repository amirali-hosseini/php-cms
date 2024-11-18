<?php

// General Functions

function dd(mixed ...$data): void
{
    echo "<pre>";
    var_dump(...$data);
    echo "</pre>";
    die();
}

function redirect(string $uri): void {
    header('Location: ' . $uri);
}


// URL Functions

function uri(string $uri): string
{
    return APP_URL . $uri;
}

function admin_uri(string $uri): string {
    return APP_URL . '/admin' . $uri;
}

// Assets Functions

function asset(string $path): string
{
    return APP_PUBLIC . '/assets' . $path;
}


// Validation Functions

function error(string $key): string
{

    if (isset($_SESSION['errors'][$key])) {

        $error = '<p class="text-right mb-0 text-danger text-sm-right">' . $_SESSION['errors'][$key] . '</p>';

        unset($_SESSION['errors'][$key]);

        return $error;

    } else {

        return '';

    }

}

function set_error(string $key, string $message): bool
{
    $_SESSION['errors'][$key] = $message;

    return true;
}

function check_size(string $size, int $MB): bool
{
    return $size >= ($MB * 1024 * 1024);
}

function check_extension(string $filename): bool
{
    $types = ALLOWED_FILE_TYPES_FOR_UPLOAD;

    list($name, $extension) = explode('.', $filename);

    return in_array($extension, $types);
}

function validation(array $fields): array
{
    foreach ($fields as $key => $error_message) {
        if (empty($_POST[$key])) {
            set_error($key, $error_message);
        } else {
            $fields[$key] = trim($_POST[$key]);
        }
    }

    return $fields;
}

function request_has_file(string $key): bool
{
    return !empty($_FILES[$key]['name']);
}

function validate(): bool
{
    return empty($_SESSION['errors']);
}


// Request Functions

function request_is_post(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function input(string $key): string|false
{
    return isset($_POST[$key]) ? trim($_POST[$key]) : false;
}


// Session Functions

function old(string $key): string
{
    $value = input($key);

    if ($value) {
        return $value;
    } else {
        return '';
    }
}

function is_logged_in(): bool
{
    return isset($_SESSION['is_logged_in']);
}


// Files Functions

function upload_file(string $from, string $dir, string $filename): array
{
    $filename = time() . '_' . $filename;

    $to = PUBLIC_DIR . "/assets/images/$dir/$filename";

    $upload_status = move_uploaded_file($from, $to);

    return ['status' => $upload_status, 'name' => $filename];
}

function delete_file(string $name, string $dir): bool
{
    $file = PUBLIC_DIR . "/assets/images/$dir/$name";

    if (file_exists($file)) {
        return unlink($file);
    }

    return false;
}