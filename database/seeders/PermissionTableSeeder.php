<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'ds-taikhoan',
            'tao-taikhoan',
            'capnhat-taikhoan',
            'xoa-taikhoan',

            'ds-khoahoc',
            'tao-khoahoc',
            'capnhat-khoahoc',
            'xoa-khoahoc',

            'ds-lophoc',
            'tao-lophoc',
            'capnhat-lophoc',
            'xoa-lophoc',

            'ds-sinhvien',
            'tao-sinhvien',
            'capnhat-sinhvien',
            'xoa-sinhvien',

            'ds-monhoc',
            'tao-monhoc',
            'capnhat-monhoc',
            'xoa-monhoc',

            'ds-sach',
            'tao-sach',
            'capnhat-sach',
            'xoa-sach',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
