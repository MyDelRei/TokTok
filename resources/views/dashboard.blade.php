@extends('app')

@section('title', 'Admin Dashboard')

@section('content')
    <!-- Main Dashboard Container -->
    <div class="max-w-7xl mx-auto space-y-8">

        <!-- Page Header -->
        <header class="pb-4">
            <h1 class="text-4xl font-bold text-gray-800">Admin Dashboard</h1>
        </header>

        <!-- Stat Cards Section -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
            <!-- Card 1 -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <p class="text-gray-500 text-sm uppercase font-semibold">Today's Sales</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">1,245</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <p class="text-gray-500 text-sm uppercase font-semibold">New Users</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">345</p>
            </div>
            <!-- Card 3 -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <p class="text-gray-500 text-sm uppercase font-semibold">Total Revenue</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">$25,300</p>
            </div>
            <!-- Card 4 -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <p class="text-gray-500 text-sm uppercase font-semibold">Active Orders</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">678</p>
            </div>
            <!-- Card 5 -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <p class="text-gray-500 text-sm uppercase font-semibold">Support Tickets</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">12</p>
            </div>
            <!-- Card 6 -->
            <div class="bg-white rounded-xl shadow-md p-6 text-center">
                <p class="text-gray-500 text-sm uppercase font-semibold">Page Views</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">8,901</p>
            </div>
        </div>

        <!-- Charts and Tables Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            <!-- Sales Graph Card -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Sales Performance</h2>
                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>

            <!-- Recent Orders Table Card -->
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Recent Orders</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Sample Data Row 1 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#45789</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Wireless Earbuds</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">John Doe</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-26</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$120.00</td>
                            </tr>
                            <!-- Sample Data Row 2 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#45790</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Smart Watch</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Jane Smith</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-25</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$250.00</td>
                            </tr>
                            <!-- Sample Data Row 3 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#45791</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Gaming Mouse</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Peter Jones</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-25</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$75.00</td>
                            </tr>
                            <!-- Sample Data Row 4 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#45792</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Laptop Sleeve</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mary Williams</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-24</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$30.00</td>
                            </tr>
                            <!-- Sample Data Row 5 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#45793</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Bluetooth Speaker</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">David Brown</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-24</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$95.00</td>
                            </tr>
                            <!-- Sample Data Row 6 -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#45794</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Webcam</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Michael Lee</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-10-23</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$60.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <!-- Another section for other data, similar to the image -->
        <div class="bg-white rounded-xl shadow-md p-6">
             <h2 class="text-2xl font-semibold text-gray-800 mb-4">Product Inventory</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Stock</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Sample Data Row -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#P001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Laptop Pro</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Electronics</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">150</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$1200.00</td>
                            </tr>
                             <!-- Sample Data Row -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#P002</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Mechanical Keyboard</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Accessories</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">250</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$90.00</td>
                            </tr>
                            <!-- Sample Data Row -->
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#P003</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4K Monitor</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Electronics</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">80</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$450.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        // JavaScript to draw a simple line graph on the canvas
        function drawLineChart() {
            const canvas = document.getElementById('salesChart');
            if (!canvas.getContext) {
                return;
            }
            
            const ctx = canvas.getContext('2d');
            
            // Set canvas size for high-DPI displays
            const dpr = window.devicePixelRatio || 1;
            const rect = canvas.parentNode.getBoundingClientRect();
            canvas.width = rect.width * dpr;
            canvas.height = rect.height * dpr;
            ctx.scale(dpr, dpr);
            
            const width = canvas.width / dpr;
            const height = canvas.height / dpr;
            const padding = 40;
            const chartWidth = width - 2 * padding;
            const chartHeight = height - 2 * padding;
            
            const data = [100, 150, 200, 250, 450, 400, 350, 280, 200, 250, 300, 500];
            const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const maxVal = Math.max(...data);

            // Clear the canvas
            ctx.clearRect(0, 0, width, height);

            // Draw X and Y axes
            ctx.beginPath();
            ctx.moveTo(padding, padding);
            ctx.lineTo(padding, height - padding);
            ctx.lineTo(width - padding, height - padding);
            ctx.strokeStyle = '#e5e7eb';
            ctx.stroke();
            
            // Draw Y-axis labels and grid lines
            const numYLabels = 5;
            for (let i = 0; i <= numYLabels; i++) {
                const y = height - padding - (i / numYLabels) * chartHeight;
                ctx.fillStyle = '#6b7280';
                ctx.fillText(Math.round((i / numYLabels) * maxVal), padding - 30, y + 5);
                ctx.beginPath();
                ctx.moveTo(padding, y);
                ctx.lineTo(width - padding, y);
                ctx.strokeStyle = '#f3f4f6';
                ctx.stroke();
            }

            // Draw X-axis labels
            for (let i = 0; i < labels.length; i++) {
                const x = padding + (i / (labels.length - 1)) * chartWidth;
                ctx.fillStyle = '#6b7280';
                ctx.fillText(labels[i], x, height - padding + 20);
            }
            
            // Draw the line graph
            ctx.beginPath();
            ctx.strokeStyle = '#3b82f6';
            ctx.lineWidth = 2;
            ctx.lineCap = 'round';
            ctx.lineJoin = 'round';
            
            for (let i = 0; i < data.length; i++) {
                const x = padding + (i / (data.length - 1)) * chartWidth;
                const y = height - padding - (data[i] / maxVal) * chartHeight;
                if (i === 0) {
                    ctx.moveTo(x, y);
                } else {
                    ctx.lineTo(x, y);
                }
            }
            ctx.stroke();
            
            // Draw data points
            for (let i = 0; i < data.length; i++) {
                const x = padding + (i / (data.length - 1)) * chartWidth;
                const y = height - padding - (data[i] / maxVal) * chartHeight;
                ctx.fillStyle = '#3b82f6';
                ctx.beginPath();
                ctx.arc(x, y, 4, 0, 2 * Math.PI);
                ctx.fill();
            }
        }

        window.addEventListener('load', drawLineChart);
        window.addEventListener('resize', drawLineChart);
    </script>
@endsection
