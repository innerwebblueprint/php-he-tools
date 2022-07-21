# Availables methods

In this file, you'll find all the available methods at this stage of development.

Table of Contents

* [Blockchain methods](#blockchain-methods)
* [Account methods](#account-methods)
* [Delegation methods](#delegation-methods)

## Blockchain methods
### getStatus()
Get the status of the selected HiveEngine node.

### getLatestBlockInfo()
Get last block information.

### getBlockInfo($block)
Get specified block information.
Fields:
- $block (required): Block to retrieve all data from this.

### getTransactionInfo($txid)
Get specified TX data.
Fields :
- $txid (required): the transaction ID

----

## Account methods
### getAccountBalance($account)
Get specified account balance for every token.
Fields :
- $account (required): The account to take all tokens balances

### getAccountHistory($account, $token, $limit)
Get TXs history from specified account.
Fields :
- $account (required): Account from which to take the history
- $token (optional): If specified, returns only toekn txs history
- $limit (optional, default:100): Ifspecified, return only the specified number results

----

## Delegation methods
### getDelegationFrom($account, $token)
Get delegations from the specified account. If token is specified too, returns only for the selected token.
Fields:
- $account (required) : the account where delegations are from
- $token (optional) : if specified, returns only selected token delegation 

### getDelegationTo($account, $token)
Get delegation to the specified account. If token is specified too, returns only for the selected token.
Fields:
- $account (required) : the account where delegations areto
- $token (optional) : if specified, returns only selected token delegation

### getPendingUndelegations($account, $token)
Get undelegations from the specified account. If token is specified too, returns only for the selected token.
Fields:
- $account (required) : the account where delegations are to
- $token (optional) : if specified, returns only selected token delegation
