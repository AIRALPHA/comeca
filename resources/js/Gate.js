export default class Gate {

    constructor(user) {
        this.user = user;
    }

    isAdmin() {
        return this.user.type == 'admin';
    }

    isConsumer() {
        return this.user.type == 'consumer';
    }

    isProducer() {
        return this.user.type == 'producer';
    }

    isMe(userU) {
        return this.user.id == userU.id;
    }

    getName() {
        return (this.user != null) ? this.user.name : "";
    }


}
