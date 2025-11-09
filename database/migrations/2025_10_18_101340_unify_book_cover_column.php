use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return UnifyBookCoverColumn extends Migration {
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table)
            if (Schema::hasColumn('books', 'cover_path') && !Schema::hasColumn('books', 'cover')) {
                $table->renameColumn('cover_path', 'cover');
            }
        });

        if (Schema::hasColumn('books', 'cover_path') && Schema::hasColumn('books', 'cover')) {
            DB::statement('UPDATE books SET cover = cover_path WHERE cover IS NULL AND cover_path IS NOT NULL');
            Schema::table('books', function (Blueprint $table) {
                $table->dropColumn('cover_path');
            });
        }
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            if (!Schema::hasColumn('books', 'cover_path')) {
                $table->string('cover_path')->nullable();
            }
        });
    }
};
