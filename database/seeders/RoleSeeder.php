<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            $role1 = Role::create(['name' => 'Administrador']);
            $role2 = Role::create(['name' => 'Padre']);
            $role3 = Role::create(['name' => 'Tesorero']);
        
            Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2, $role3]);
        
            Permission::create(['name' => 'admin.alumnos.index'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'admin.alumnos.create'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.alumnos.edit'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.alumnos.destroy'])->syncRoles([$role1]);
        
            Permission::create(['name' => 'admin.escala.index'])->syncRoles([$role1, $role3]);
            Permission::create(['name' => 'admin.escala.create'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.escala.edit'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.escala.destroy'])->syncRoles([$role1]);
        
            Permission::create(['name' => 'admin.deuda.index'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'admin.deuda.create'])->syncRoles([$role1, $role3]);
            Permission::create(['name' => 'admin.deuda.edit'])->syncRoles([$role1, $role3]);
            Permission::create(['name' => 'admin.deuda.destroy'])->syncRoles([$role1, $role3]);
        
            Permission::create(['name' => 'admin.condonacion.index'])->syncRoles([$role1, $role3]);
            Permission::create(['name' => 'admin.condonacion.create'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.condonacion.edit'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.condonacion.destroy'])->syncRoles([$role1]);
        
            Permission::create(['name' => 'admin.concepto.index'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.concepto.create'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.concepto.edit'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.concepto.destroy'])->syncRoles([$role1]);
        
            Permission::create(['name' => 'admin.concepto_escala.index'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.concepto_escala.create'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.concepto_escala.edit'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.concepto_escala.destroy'])->syncRoles([$role1]);
        
            Permission::create(['name' => 'admin.asignar.index'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.asignar.create'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.asignar.edit'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.asignar.destroy'])->syncRoles([$role1]);
        
            Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.users.create'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.users.edit'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1]);
        
            Permission::create(['name' => 'admin.recibo.index'])->syncRoles([$role1, $role2, $role3]);
            Permission::create(['name' => 'admin.recibo.create'])->syncRoles([$role1, $role2]);
            Permission::create(['name' => 'admin.recibo.edit'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.recibo.destroy'])->syncRoles([$role1]);
        
            Permission::create(['name' => 'admin.pago.index'])->syncRoles([$role1, $role3]);
            Permission::create(['name' => 'admin.pago.create'])->syncRoles([$role1]);
            Permission::create(['name' => 'admin.pago.edit'])->syncRoles([$role1, $role3]);
            Permission::create(['name' => 'admin.pago.destroy'])->syncRoles([$role1, $role3]);
        } 
        }
    
    
