import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // ✅ CSS files
                'resources/css/BaoTri.css',
                'resources/css/GamMay01.css',
                'resources/css/GioiThieu01.css',
                'resources/css/LienHe01.css',
                'resources/css/PhanFooter.css',
                'resources/css/PhucHoi.css',
                'resources/css/ThanhSidebar.css',
                'resources/css/TinTucMain.css',
                'resources/css/TinTucSearch.css',
                'resources/css/TrangTinTuc.css',
                'resources/css/TrangChu02.css',
                'resources/css/SignUp.css',          
                'resources/css/SignIn.css',        

                // ✅ JS files
                'resources/js/CauHoiThuongGap.js',
                'resources/js/ChuyenDongFeedback01.js',
                'resources/js/ChuyenDongFeedback02.js',
                'resources/js/CuonDichVu.js',
                'resources/js/NutCuonXuong02.js',
                'resources/js/PhucHoi01.js',
                'resources/js/ThanhSidebar.js',
                'resources/js/ThongTinMoi01.js',
                'resources/js/ThongTinMoi02.js',
                'resources/js/TinTucGanDay.js',
                'resources/js/TinTucMain.js',
                'resources/js/TinTucSearch.js',
                'resources/js/LienHe.js',
            ],
            refresh: true,
        }),
    ],
});
