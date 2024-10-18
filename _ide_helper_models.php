<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sortie> $sortie
 * @property-read int|null $sortie_count
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaire query()
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaire whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficiaire whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperBeneficiaire {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $Sold
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Caisse newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Caisse newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Caisse query()
 * @method static \Illuminate\Database\Eloquent\Builder|Caisse whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caisse whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caisse whereSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caisse whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCaisse {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sortie> $sortie
 * @property-read int|null $sortie_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCategory {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Entrer> $entres
 * @property-read int|null $entres_count
 * @method static \Illuminate\Database\Eloquent\Builder|Category_enter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category_enter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category_enter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category_enter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category_enter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category_enter whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category_enter whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperCategory_enter {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $Montant
 * @property string $Description
 * @property int $category_enter_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category_enter|null $Category_Enter
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer whereCategoryEnterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrer whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperEntrer {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int|null $Contact
 * @property string|null $Image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Fournisseur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperFournisseur {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $firstName
 * @property string $email
 * @property int $Contact
 * @property string|null $Image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sortie> $sortie
 * @property-read int|null $sortie_count
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel query()
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personnel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPersonnel {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $Montant
 * @property string $Context
 * @property int $category_id
 * @property int $personnel_id
 * @property int $user_id
 * @property int $beneficiaire_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Beneficiaire $beneficiaire
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Personnel $personnel
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie whereBeneficiaireId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie whereContext($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie wherePersonnelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sortie whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperSortie {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Entrer> $entre
 * @property-read int|null $entre_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Sortie> $sortie
 * @property-read int|null $sortie_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

