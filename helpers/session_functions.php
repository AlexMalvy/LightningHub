<?php

function old(string $key)
{
    return ($_SESSION['old'] ?? [])[$key] ?? '';
}

function errors(string $message)
{
    if (!isset($_SESSION['errors'])) {
        $_SESSION['errors'] = [];
    }

    $_SESSION['errors'][] = $message;
}

function success(string $message)
{
    if (!isset($_SESSION['success'])) {
        $_SESSION['success'] = [];
    }

    $_SESSION['success'][] = $message;
}

function displayErrorsAndMessages()
{
    // Errors messages
    if (isset($_SESSION['errors'])) {
        if (is_array($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo '<p class="color-red">'.$error.'</p>';
            }
        } else {
            echo '<p class="color-red">'.$_SESSION['errors'].'</p>';
        }

        unset($_SESSION['errors']);
    }

    // Success messages
    if (isset($_SESSION['success'])) {
        if (is_array($_SESSION['success'])) {
            foreach ($_SESSION['success'] as $success) {
                echo '<p class="color-green">'.$success.'</p>';
            }
        } else {
            echo '<p class="color-green">'.$_SESSION['success'].'</p>';
        }

        unset($_SESSION['success']);
    }
}
