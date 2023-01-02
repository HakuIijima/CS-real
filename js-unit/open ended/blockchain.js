// import bcrypt from '/bcrypt.js';

class Block{
    constructor(id, previousHash, data){
        this.blockid = id;
        this.time = Date.now();    
        // this.blockhash = this.getBlockHash();
        this.prevHash = previousHash;
        this.data = data;
    }

    // getBlockHash(){
    //     return bcrypt.hashSync(String(this.blockid + this.time + this.blockhash + this.previousHash + JSON.stringify(this.data)), 10)
    // };
}
export default class BlockChain{
    constructor(){
        this.chain = [];
    }

    addBlock(data){
        let blockid = this.chain.length;
        let previousHash = this.chain.length !==0 ? this.chain[this.chain.length-1].blockhash : '';
        let block = new Block(blockid, previousHash, data);

        this.chain.push(block);
    }


   // const validation Rule = {

   // }

    isChainValid(){
        for(let i=1; i<this.chain.length; i++){
            const currBlock = this.chain[i];
            const prevBlock = this.chain[i-1];
            console.log(true);

            if(currBlock.prevHash != prevBlock.blockhash){
                console.log(i);
                console.log(this.chain[i]);
                console.log(currBlock.prevBlock);
                console.log(prevBlock.blockhash);
                return false;
            }
        }
        return true;
    }
}