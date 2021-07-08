<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWalletAPIRequest;
use App\Http\Requests\API\UpdateWalletAPIRequest;
use App\Models\Wallet;
use App\Repositories\WalletRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class WalletController
 * @package App\Http\Controllers\API
 */

class WalletAPIController extends AppBaseController
{
    /** @var  WalletRepository */
    private $walletRepository;

    public function __construct(WalletRepository $walletRepo)
    {
        $this->walletRepository = $walletRepo;
    }

    /**
     * Display a listing of the Wallet.
     * GET|HEAD /wallets
     *
     * @param Request $request
     * @return Response
     */
    // public function index(Request $request)
    // {
    //     $wallets = $this->walletRepository->all(
    //         $request->except(['skip', 'limit']),
    //         $request->get('skip'),
    //         $request->get('limit')
    //     );

    //     return $this->sendResponse($wallets->toArray(), 'Wallets retrieved successfully');
    // }

    /**
     * Store a newly created Wallet in storage.
     * POST /clients/charge
     *
     * @param CreateWalletAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWalletAPIRequest $request)
    {
        $input = $request->all();

        $wallet = $this->walletRepository->charge($input);

        return $this->sendResponse($wallet->toArray(), 'Wallet saved successfully');
    }

    /**
     * Display the user Wallet.
     * GET|HEAD /clients/wallet
     *
     * @param int $id
     *
     * @return Response
     */
    public function wallet()
    {
        /** @var Wallet $wallet */
        $wallet = $this->walletRepository->wallet();

        if (empty($wallet)) {
            return $this->sendError('Wallet not found');
        }

        return $this->sendResponse($wallet, 'Wallet retrieved successfully');
    }

    /**
     * Update the specified Wallet in storage.
     * PUT/PATCH /wallets/{id}
     *
     * @param int $id
     * @param UpdateWalletAPIRequest $request
     *
     * @return Response
     */
    // public function update($id, UpdateWalletAPIRequest $request)
    // {
    //     $input = $request->all();

    //     /** @var Wallet $wallet */
    //     $wallet = $this->walletRepository->find($id);

    //     if (empty($wallet)) {
    //         return $this->sendError('Wallet not found');
    //     }

    //     $wallet = $this->walletRepository->update($input, $id);

    //     return $this->sendResponse($wallet->toArray(), 'Wallet updated successfully');
    // }

    /**
     * Remove the specified Wallet from storage.
     * DELETE /wallets/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    // public function destroy($id)
    // {
    //     /** @var Wallet $wallet */
    //     $wallet = $this->walletRepository->find($id);

    //     if (empty($wallet)) {
    //         return $this->sendError('Wallet not found');
    //     }

    //     $wallet->delete();

    //     return $this->sendSuccess('Wallet deleted successfully');
    // }
}
