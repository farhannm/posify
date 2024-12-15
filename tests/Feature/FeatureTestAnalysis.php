<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Order;
use Carbon\Carbon;


class FeatureTestAnalysis extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test revenue with date range.
     *
     * @return void
     */
    public function test_revenue_with_existing_data()
    {
        $rentangTanggal = '2024-11-01 to 2024-11-30';

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard', [
                            'rentang_tanggal' => $rentangTanggal,
                        ]);

                        $response->assertStatus(200)
                        ->assertSee('22.686.500,00');     
    }

    public function test_revenue_with_single_day_date()
    {
        $rentangTanggal = '2024-11-01';

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard', [
                            'rentang_tanggal' => $rentangTanggal,
                        ]);

                        $response->assertStatus(200)
                        ->assertSee('23.000,00');     
    }

    public function test_revenue_without_date_range()
    {

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard');
                        $response->assertStatus(200)
                        ->assertSee('341.000,00');     
    }


    public function test_totalTransactions_with_existing_data()
    {
        $rentangTanggal = '2024-11-01 to 2024-11-30';

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard', [
                            'rentang_tanggal' => $rentangTanggal,
                        ]);

                        $response->assertStatus(200)
                        ->assertSee('167');     
    }

    public function test_totalTransactions_with_single_day_date()
    {
        $rentangTanggal = '2024-11-21';

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard', [
                            'rentang_tanggal' => $rentangTanggal,
                        ]);

                        $response->assertStatus(200)
                        ->assertSee('5');     
    }

    public function test_totalTransactions_without_date_range()
    {

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard');
                        $response->assertStatus(200)
                        ->assertSee('3');     
    }
    public function test_revenue_this_month()
    {
        $startOfMonth = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endOfMonth = Carbon::now()->endOfMonth()->format('Y-m-d');
        $rentangTanggal = "$startOfMonth to $endOfMonth";

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard', [
                            'rentang_tanggal' => $rentangTanggal,
                        ]);

                        $response->assertStatus(200)
                        ->assertSee('16.933.500,00');     
    }

    public function test_itemSold_with_existing_data()
    {
        $rentangTanggal = '2024-11-01 to 2024-11-30';

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard', [
                            'rentang_tanggal' => $rentangTanggal,
                        ]);

                        $response->assertStatus(200)
                        ->assertSee('953');     
    }

    public function test_itemSold_with_single_day_date()
    {
        $rentangTanggal = '2024-11-21';

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard', [
                            'rentang_tanggal' => $rentangTanggal,
                        ]);

                        $response->assertStatus(200)
                        ->assertSee('23');     
    }

    public function test_itemSold_without_date_range()
    {

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard');
                        $response->assertStatus(200)
                        ->assertSee('13');     
    }

    public function test_rankSold_with_existing_data()
    {
        $rentangTanggal = '2024-11-01 to 2024-11-30';

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard', [
                            'rentang_tanggal' => $rentangTanggal,
                        ]);

                        $response->assertStatus(200)
                        ->assertSee('Mocha')
                        ->assertSee('151')
                        ->assertSee('Korean Milk')
                        ->assertSee('77');       
    }

    public function test_rankSold_with_single_day_date()
    {
        $rentangTanggal = '2024-11-21';

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard', [
                            'rentang_tanggal' => $rentangTanggal,
                        ]);

                        $response->assertStatus(200)
                        ->assertSee('Flat White')
                        ->assertSee('5')
                        ->assertSee('Macchiato')
                        ->assertSee('1');       
    }

    public function test_rankSold_without_date_range()
    {

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard');
                        $response->assertStatus(200)
                        ->assertSee('Flat White')
                        ->assertSee('8')
                        ->assertSee('Korean Milk')
                        ->assertSee('1');     
    }

    public function test_almost_sold_item()
    {

        $user = User::factory()->create([
            'role' => 'owner', 
        ]);

        $response = $this->actingAs($user)
                        ->json('GET', '/owner-dashboard');
                        $response->assertStatus(200)
                        ->assertSee('Cappuccino')
                        ->assertSee('10')
                        ->assertSee('Espresso')
                        ->assertSee('10');     
    }
}
