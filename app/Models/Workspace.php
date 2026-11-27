<?php

namespace App\Models;

// HasUuids لتوليد وإدارة المفتاح الأساسي id بصيغة UUID تلقائياً في Eloquent
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    use HasFactory, HasUuids;

    /**
     * اسم الجدول المرتبط بالنموذج في قاعدة البيانات.
     */
    protected $table = 'workspaces';

    /**
     * تعطيل عمود updated_at لأن جدول workspaces يحتوي على created_at فقط ولا يحتوي على updated_at.
     */
    public const UPDATED_AT = null;

    /**
     * الحقول المسموح بإسنادها وتعبئتها جماعياً عند الإنشاء أو التعديل.
     */
    protected $fillable = [
        'name', // اسم مساحة العمل أو الفريق
    ];

    /**
     * تحويل أنواع الحقول تلقائياً عند قراءتها أو إسنادها في Eloquent.
     */
    protected $casts = [
        'created_at' => 'datetime', // تحويل تاريخ الإنشاء إلى كائن Carbon للتعامل مع التواريخ بسهولة
    ];

    /**
     * علاقة 1:N: يرجع جميع المستخدمين التابعين لمساحة العمل هذه.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'workspace_id');
    }

    /**
     * علاقة 1:N: يرجع العلامات التجارية / المشاريع التابعة لمساحة العمل.
     * ملاحظة: إذا قمت بجعل workspace_id فريداً (unique) في جدول brands فحوّلها إلى hasOne.
     */
    /**
 * مساحة العمل لديها علامة تجارية واحدة فقط.
 */
public function brand()
{
    return $this->hasOne(Brand::class, 'workspace_id');
}
}