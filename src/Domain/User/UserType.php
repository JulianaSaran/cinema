<?php

namespace Juliana\Cinema\Domain\User;

enum UserType: string
{
    case USER = "user";
    case ADMIN = "admin";
}
