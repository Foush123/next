/**
 * Dashboard functionality for the Next theme.
 *
 * @module theme_next/dashboard
 * @copyright  2024 Next LMS
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['jquery', 'core/ajax', 'core/notification'], function($, Ajax, Notification) {
    
    var Dashboard = {
        
        /**
         * Initialize the dashboard functionality.
         */
        init: function() {
            this.initProgressBars();
            this.initCharts();
            this.initInteractions();
            this.initAnimations();
        },
        
        /**
         * Initialize progress bars with animations.
         */
        initProgressBars: function() {
            $('.progress-fill').each(function() {
                var $this = $(this);
                var width = $this.data('width') || $this.attr('style').match(/width:\s*(\d+%)/);
                
                if (width) {
                    $this.css('width', '0%');
                    setTimeout(function() {
                        $this.css('width', width);
                    }, 300);
                }
            });
        },
        
        /**
         * Initialize charts and visualizations.
         */
        initCharts: function() {
            this.initLearningProgressChart();
            this.initTimeSelector();
        },
        
        /**
         * Initialize the learning progress chart.
         */
        initLearningProgressChart: function() {
            var canvas = document.getElementById('learningProgressChart');
            if (!canvas) return;
            
            var ctx = canvas.getContext('2d');
            var data = {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Learning Progress',
                    data: [20, 45, 70, 85],
                    borderColor: '#6366f1',
                    backgroundColor: 'rgba(99, 102, 241, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4
                }]
            };
            
            // Simple chart implementation
            this.drawSimpleChart(ctx, data);
        },
        
        /**
         * Draw a simple chart without external libraries.
         */
        drawSimpleChart: function(ctx, data) {
            var canvas = ctx.canvas;
            var width = canvas.width;
            var height = canvas.height;
            var padding = 40;
            var chartWidth = width - (padding * 2);
            var chartHeight = height - (padding * 2);
            
            // Clear canvas
            ctx.clearRect(0, 0, width, height);
            
            // Draw grid
            ctx.strokeStyle = '#e2e8f0';
            ctx.lineWidth = 1;
            
            // Horizontal grid lines
            for (var i = 0; i <= 4; i++) {
                var y = padding + (chartHeight / 4) * i;
                ctx.beginPath();
                ctx.moveTo(padding, y);
                ctx.lineTo(width - padding, y);
                ctx.stroke();
            }
            
            // Vertical grid lines
            for (var i = 0; i <= data.labels.length; i++) {
                var x = padding + (chartWidth / data.labels.length) * i;
                ctx.beginPath();
                ctx.moveTo(x, padding);
                ctx.lineTo(x, height - padding);
                ctx.stroke();
            }
            
            // Draw data line
            ctx.strokeStyle = '#6366f1';
            ctx.lineWidth = 3;
            ctx.beginPath();
            
            data.datasets[0].data.forEach(function(value, index) {
                var x = padding + (chartWidth / (data.labels.length - 1)) * index;
                var y = height - padding - (value / 100) * chartHeight;
                
                if (index === 0) {
                    ctx.moveTo(x, y);
                } else {
                    ctx.lineTo(x, y);
                }
            });
            ctx.stroke();
            
            // Draw data points
            ctx.fillStyle = '#6366f1';
            data.datasets[0].data.forEach(function(value, index) {
                var x = padding + (chartWidth / (data.labels.length - 1)) * index;
                var y = height - padding - (value / 100) * chartHeight;
                
                ctx.beginPath();
                ctx.arc(x, y, 6, 0, 2 * Math.PI);
                ctx.fill();
            });
            
            // Draw labels
            ctx.fillStyle = '#64748b';
            ctx.font = '12px Inter, sans-serif';
            ctx.textAlign = 'center';
            
            data.labels.forEach(function(label, index) {
                var x = padding + (chartWidth / (data.labels.length - 1)) * index;
                ctx.fillText(label, x, height - 10);
            });
        },
        
        /**
         * Initialize time selector functionality.
         */
        initTimeSelector: function() {
            $('.time-btn').on('click', function() {
                $('.time-btn').removeClass('active');
                $(this).addClass('active');
                
                var period = $(this).data('period');
                Dashboard.updateChartData(period);
            });
        },
        
        /**
         * Update chart data based on selected time period.
         */
        updateChartData: function(period) {
            // Simulate data loading
            var data = {
                '1-month': {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                    datasets: [{
                        data: [20, 45, 70, 85]
                    }]
                },
                '3-months': {
                    labels: ['Month 1', 'Month 2', 'Month 3'],
                    datasets: [{
                        data: [30, 60, 85]
                    }]
                },
                '6-months': {
                    labels: ['Q1', 'Q2'],
                    datasets: [{
                        data: [40, 80]
                    }]
                },
                '1-year': {
                    labels: ['Q1', 'Q2', 'Q3', 'Q4'],
                    datasets: [{
                        data: [25, 50, 75, 90]
                    }]
                }
            };
            
            // Update chart with new data
            var chartData = data[period];
            if (chartData) {
                // Re-render chart with new data
                setTimeout(function() {
                    var canvas = document.getElementById('learningProgressChart');
                    if (canvas) {
                        var ctx = canvas.getContext('2d');
                        Dashboard.drawSimpleChart(ctx, chartData);
                    }
                }, 300);
            }
        },
        
        /**
         * Initialize interactive elements.
         */
        initInteractions: function() {
            this.initCardHovers();
            this.initButtonInteractions();
        },
        
        /**
         * Initialize card hover effects.
         */
        initCardHovers: function() {
            $('.dashboard-card').on('mouseenter', function() {
                $(this).addClass('hovered');
            }).on('mouseleave', function() {
                $(this).removeClass('hovered');
            });
        },
        
        /**
         * Initialize button interactions.
         */
        initButtonInteractions: function() {
            $('.btn').on('click', function(e) {
                // Add ripple effect
                var $btn = $(this);
                var ripple = $('<span class="ripple"></span>');
                var rect = this.getBoundingClientRect();
                var size = Math.max(rect.width, rect.height);
                var x = e.clientX - rect.left - size / 2;
                var y = e.clientY - rect.top - size / 2;
                
                ripple.css({
                    width: size,
                    height: size,
                    left: x,
                    top: y
                });
                
                $btn.append(ripple);
                
                setTimeout(function() {
                    ripple.remove();
                }, 600);
            });
        },
        
        /**
         * Initialize animations.
         */
        initAnimations: function() {
            this.initScrollAnimations();
            this.initCounterAnimations();
        },
        
        /**
         * Initialize scroll-triggered animations.
         */
        initScrollAnimations: function() {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, {
                threshold: 0.1
            });
            
            $('.dashboard-card, .metric-value').each(function() {
                observer.observe(this);
            });
        },
        
        /**
         * Initialize counter animations.
         */
        initCounterAnimations: function() {
            $('.metric-value').each(function() {
                var $this = $(this);
                var target = parseInt($this.text());
                var duration = 2000;
                var start = 0;
                var increment = target / (duration / 16);
                
                var timer = setInterval(function() {
                    start += increment;
                    if (start >= target) {
                        $this.text(target);
                        clearInterval(timer);
                    } else {
                        $this.text(Math.floor(start));
                    }
                }, 16);
            });
        }
    };
    
    return Dashboard;
});