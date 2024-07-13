<?php

declare(strict_types=1);

namespace App\DataObjects\Inputs;

use App\DataObjects\HasSerialize;
use Illuminate\Http\Request;
use JsonSerializable;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;

final class UserCredentialsInputDTO implements DataObjectContract, JsonSerializable, InputContract
{
    use HasSerialize;
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ) {
    }
    
    public static function buildFromRequest(Request $request)
    {
        return new UserCredentialsInputDTO(
            email: $request->input('email'),
            password: $request->input('password'),
        );
    }
    
    /**
     * Serialize the DTO
     * @return array
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
