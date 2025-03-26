<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'tbCustomer';
    protected $primaryKey = 'CustomerID';
    public $incrementing = false;  // ปิดการใช้ auto-increment
    protected $keyType = 'string'; // ระบุว่าเป็น string เพื่อใช้ UUID

    // กำหนดฟิลด์ที่สามารถกรอกข้อมูลได้
    protected $fillable = [
        'CustomerID',  // UUID ของลูกค้า
        'ParentCustomerID',  // UUID หรือ NULL
        'IDCard',  // หมายเลขบัตรประชาชน
        'Prefix',  // คำนำหน้า
        'FName',  // ชื่อ
        'LName',  // นามสกุล
        'Address',  // ที่อยู่
        'Gender',  // เพศ (M หรือ F)
        'BirthDate',  // วันเกิด
        'CustomerSize',  // ขนาดลูกค้า (S, M, B)
        'CustomerGrade',  // เกรดลูกค้า (A, B, C, D)
        'CreateBy',  // ผู้สร้างข้อมูล
        'CreateDate',  // วันที่สร้างข้อมูล
        'UpdateBy',  // ผู้ที่อัปเดตข้อมูลล่าสุด
        'UpdateDate',  // วันที่อัปเดตข้อมูลล่าสุด
    ];

    // กำหนดให้ไม่ใช้ timestamp default (created_at, updated_at)
    public $timestamps = false;

    // ฟังก์ชันความสัมพันธ์ระหว่างลูกค้าหลักและลูกค้าย่อย
    public function parentCustomer()
    {
        return $this->belongsTo(Customer::class, 'ParentCustomerID');
    }

    // กำหนดให้ใช้ 'CustomerID' แทน 'id' สำหรับการค้นหา
    public function getKeyName()
    {
        return 'CustomerID';
    }
}
