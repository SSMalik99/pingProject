<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
    <div class="ml-2">
        <h4 class="ml-2">Filters</h4>
        <a href="/pingProject/showAllUsers">Show All</a>
    </div>
    
    @foreach ($userRoles as $userRole)
    <div class="ml-2">
        <a href="/findUsersWithRoleId/{{ $userRole->role_id }}">{{ Str::ucfirst($userRole->role_name) }}</a>
    </div>
    @endforeach
</div>