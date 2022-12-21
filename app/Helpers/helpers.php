<?php

  if (! function_exists('isAdminOrsenior')) {
    function isAdminOrSenior($role) {
      if ($role == 'admin') {
        return true;
      } else if ($role == 'senior hrd') {
        return true;
      } else {
        return false;
      }
    }
  }

  if (! function_exists('isAdminOrSeniorOrUser')) {
    function isAdminOrSeniorOrUser($role) {
      if ($role == 'admin') {
        return true;
      } else if ($role == 'senior hrd') {
        return true;
      } else if ($role == 'user') {
        return true;
      } else {
        return false;
      }
    }
  }